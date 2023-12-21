@auth
    @if (request()->is('/'))
        <script>
            $(function() {
                var chatMessages = @json($chat_message);
                var authId = {{ $auth_id }}
                var authChatId = {{ $chat_id ? $chat_id : 0 }};
                $('#em_freelancer_chat_alert').hide();
                $('#ve_freelancer_chat_alert').hide();
                $('#customer_chat_alert').hide();
                $('#admin_chat_alert').hide();
                console.log(authChatId);
                authMesage = [];
                chatMessages.forEach((chatMessage) => {
                    if (chatMessage.chat_id == authChatId) {
                        authMesage.push(chatMessage);
                    }
                })
                if (authMesage != '') {
                    if (authMesage[0].send_id == 1 && authId == 4) {
                        $('#em_freelancer_chat_alert').show();
                    } else if (authMesage[0].send_id == 1 && authId == 5) {
                        $('#ve_freelancer_chat_alert').show();
                    } else if (authMesage[0].send_id == 1 && authId != 4 && authId != 5 && authId != 1) {
                        $('#customer_chat_alert').show();
                    }
                }
                if (chatMessages[0].send_id != 1) {
                    $('#admin_chat_alert').show();
                }
            })
        </script>
    @endif
    <script>
        $(function() {
            var chat_id;
            $('.chatting_content').hide();
            $('.chatting_close').hide();
            $('.chatting_start').click(function() {
                $('.chatting_start').hide();
                $('.chatting_content').show();
                $('.chatting_close').show();
            })
            $('.chatting_close').click(function() {
                $('.chatting_start').show();
                $('.chatting_content').hide();
                $('.chatting_close').hide();
            })

            // submit button background color change
            $('.chat_input').on('input', function() {
                if ($(this).val().trim() !== '') {
                    $('.chat_submit').css('background-color', '#1E90FF');
                } else {
                    $('.chat_submit').css('background-color', '#eee');
                }
            });
            $('.chat_input').keydown(function(e) {
                if (e.shiftKey && e.keyCode === 13) {
                    // Insert a new line character
                    var startPos = this.selectionStart;
                    var endPos = this.selectionEnd;
                    this.value = this.value.substring(0, startPos) + "\n" + this.value.substring(endPos);
                    this.selectionStart = this.selectionEnd = startPos + 1;
                    e.preventDefault(); // Prevent the default Enter key behavior
                } else if (e.keyCode === 13) {
                    $('.chat_submit').click();
                }
            });
            $('.chat_input').on('input', function() {
                this.style.height =
                    '36px'; // Reset the height to auto to correctly calculate the new height
                this.style.height = (this.scrollHeight) + 'px'; // Set the height to the scroll height
            });

            let adminLastMessageId = 0;
            let adminlongPollingInProgress = false;
            let customerLastMessageId = 0;
            let customerlongPollingInProgress = false;
            let emFreelancerLastMessageId = 0;
            let emFreelancerlongPollingInProgress = false;
            let veFreelancerLastMessageId = 0;
            let veFreelancerlongPollingInProgress = false;
            $('#admin_chatting_close').click(function() {
                adminlongPollingInProgress = true;
            })
            $('#customer_chatting_close').click(function() {
                customerlongPollingInProgress = true;
            })
            $('#em_freelancer_chatting_close').click(function() {
                emFreelancerlongPollingInProgress = true;
            })
            $('#ve_freelancer_chatting_close').click(function() {
                veFreelancerlongPollingInProgress = true;
            })

            function adminGetMessagesLongPolling() {
                if (!adminlongPollingInProgress) {
                    adminlongPollingInProgress = true;
                    $.ajax({
                        url: '{{ __('routes.admin-chat-long-polling') }}',
                        type: 'get',
                        data: {
                            adminLastMessageId: adminLastMessageId
                        },
                        success: function(messages) {
                            console.log('polling', messages);
                            if (messages.length > 0) {
                                messages.forEach(message => {
                                    // Process and display the new message
                                    adminLastMessageId = message
                                        .id; // Update the last received message ID
                                    message.message = message.message.replace(/\n/g,
                                        "<br>");
                                    // Convert UTC time to UTC+1 time zone
                                    let utcDateTime = new Date(message.created_at);
                                    let germanDateTime = new Date(utcDateTime.getTime() +
                                        utcDateTime.getTimezoneOffset() * 60000);
                                    germanDateTime.setHours(germanDateTime.getHours() + 1);

                                    // Format date and time in German time format
                                    let formattedDate =
                                        `${germanDateTime.getDate().toString().padStart(2, '0')}-${(germanDateTime.getMonth() + 1).toString().padStart(2, '0')}-${germanDateTime.getFullYear()}`;
                                    let formattedTime =
                                        `${germanDateTime.getHours().toString().padStart(2, '0')}:${germanDateTime.getMinutes().toString().padStart(2, '0')}`;

                                    if (message.send_id == 1) {
                                        $('.chatting_interface').append(
                                            `<div style="display:inline-block; float:right;"><div class="chat_send_message">${message.message}</div><div class="chat_time">${formattedDate + ' ' + formattedTime}</div></div>`
                                        );
                                        $('.chat_send_message').last().show();
                                        $('.chat_time').last().show();
                                    } else {
                                        $('.chatting_interface').append(
                                            `<div style="display:inline-block; "><div class="chat_receive_message">${message.message}</div><div class="chat_time">${formattedDate + ' ' + formattedTime}</div></div>`
                                        );
                                        $('.chat_receive_message').last().show();
                                        $('.chat_time').last().show();
                                    }
                                });
                            }
                        },
                        error: function() {
                            console.error("Long polling request failed");
                        },
                        complete: function() {
                            adminlongPollingInProgress = false;
                            if (!adminlongPollingInProgress) {
                                setTimeout(adminGetMessagesLongPolling, 1000);
                            }
                            $('.chatting_interface').scrollTop($('.chatting_interface')[0]
                                .scrollHeight);
                        },
                        dataType: 'json'
                    });
                }
            }

            function customerGetMessagesLongPolling() {
                console.log("customer long polling found");
                if (!customerlongPollingInProgress) {
                    customerlongPollingInProgress = true;
                    $.ajax({
                        url: '{{ __('routes.customer-chat-long-polling') }}',
                        type: 'get',
                        data: {
                            customerLastMessageId: customerLastMessageId
                        },
                        success: function(messages) {
                            console.log('polling', messages);
                            if (messages.length > 0) {
                                messages.forEach(message => {
                                    // Process and display the new message
                                    customerLastMessageId = message
                                        .id; // Update the last received message ID

                                    message.message = message.message.replace(/\n/g,
                                        "<br>");
                                    // Convert UTC time to UTC+1 time zone
                                    let utcDateTime = new Date(message.created_at);
                                    let germanDateTime = new Date(utcDateTime.getTime() +
                                        utcDateTime.getTimezoneOffset() * 60000);
                                    germanDateTime.setHours(germanDateTime.getHours() + 1);

                                    // Format date and time in German time format
                                    let formattedDate =
                                        `${germanDateTime.getDate().toString().padStart(2, '0')}-${(germanDateTime.getMonth() + 1).toString().padStart(2, '0')}-${germanDateTime.getFullYear()}`;
                                    let formattedTime =
                                        `${germanDateTime.getHours().toString().padStart(2, '0')}:${germanDateTime.getMinutes().toString().padStart(2, '0')}`;

                                    if (message.send_id == 1) {
                                        $('.chatting_interface').append(
                                            `<div style="display:inline-block;"><div class="chat_receive_message">${message.message}</div><div class="chat_time">${formattedDate + ' ' + formattedTime}</div></div>`
                                        );
                                        $('.chat_receive_message').last().show();
                                        $('.chat_time').last().show();
                                    } else {
                                        $('.chatting_interface').append(
                                            `<div style="display:inline-block; float:right;"><div class="chat_send_message">${message.message}</div><div class="chat_time">${formattedDate + ' ' + formattedTime}</div></div>`
                                        );
                                        $('.chat_send_message').last().show();
                                        $('.chat_time').last().show();
                                    }
                                });
                            }
                        },
                        error: function() {
                            console.error("Long polling request failed");
                        },
                        complete: function() {
                            customerlongPollingInProgress = false;
                            setTimeout(customerGetMessagesLongPolling,
                                1000); // Call the function again after a short delay
                            $('.chatting_interface').scrollTop($('.chatting_interface')[0]
                                .scrollHeight);
                        },
                        dataType: 'json'
                    });
                }
            }

            function emFreelancerGetMessagesLongPolling() {
                if (!emFreelancerlongPollingInProgress) {
                    emFreelancerlongPollingInProgress = true;
                    $.ajax({
                        url: '{{ __('routes.freelancer-em-chat-long-polling') }}',
                        type: 'get',
                        data: {
                            emFreelancerLastMessageId: emFreelancerLastMessageId
                        },
                        success: function(messages) {
                            console.log('polling', messages);
                            if (messages.length > 0) {
                                messages.forEach(message => {
                                    // Process and display the new message
                                    emFreelancerLastMessageId = message
                                        .id; // Update the last received message ID

                                    message.message = message.message.replace(/\n/g,
                                        "<br>");
                                    // Convert UTC time to UTC+1 time zone
                                    let utcDateTime = new Date(message.created_at);
                                    let germanDateTime = new Date(utcDateTime.getTime() +
                                        utcDateTime.getTimezoneOffset() * 60000);
                                    germanDateTime.setHours(germanDateTime.getHours() + 1);

                                    // Format date and time in German time format
                                    let formattedDate =
                                        `${germanDateTime.getDate().toString().padStart(2, '0')}-${(germanDateTime.getMonth() + 1).toString().padStart(2, '0')}-${germanDateTime.getFullYear()}`;
                                    let formattedTime =
                                        `${germanDateTime.getHours().toString().padStart(2, '0')}:${germanDateTime.getMinutes().toString().padStart(2, '0')}`;

                                    if (message.send_id == 1) {
                                        $('.chatting_interface').append(
                                            `<div style="display:inline-block;"><div class="chat_receive_message">${message.message}</div><div class="chat_time">${formattedDate + ' ' + formattedTime}</div></div>`
                                        );
                                        $('.chat_receive_message').last().show();
                                        $('.chat_time').last().show();
                                    } else {
                                        $('.chatting_interface').append(
                                            `<div style="display:inline-block; float:right;"><div class="chat_send_message">${message.message}</div><div class="chat_time">${formattedDate + ' ' + formattedTime}</div></div>`
                                        );
                                        $('.chat_send_message').last().show();
                                        $('.chat_time').last().show();
                                    }
                                });
                            }
                        },
                        error: function() {
                            console.error("Long polling request failed");
                        },
                        complete: function() {
                            emFreelancerlongPollingInProgress = false;
                            setTimeout(emFreelancerGetMessagesLongPolling,
                                1000); // Call the function again after a short delay
                            $('.chatting_interface').scrollTop($('.chatting_interface')[0]
                                .scrollHeight);
                        },
                        dataType: 'json'
                    });
                }
            }

            function veFreelancerGetMessagesLongPolling() {
                if (!veFreelancerlongPollingInProgress) {
                    veFreelancerlongPollingInProgress = true;
                    $.ajax({
                        url: '{{ __('routes.freelancer-ve-chat-long-polling') }}',
                        type: 'get',
                        data: {
                            veFreelancerLastMessageId: veFreelancerLastMessageId
                        },
                        success: function(messages) {
                            console.log('polling', messages);
                            if (messages.length > 0) {
                                messages.forEach(message => {
                                    // Process and display the new message
                                    veFreelancerLastMessageId = message
                                        .id; // Update the last received message ID

                                    message.message = message.message.replace(/\n/g,
                                        "<br>");
                                    // Convert UTC time to UTC+1 time zone
                                    let utcDateTime = new Date(message.created_at);
                                    let germanDateTime = new Date(utcDateTime.getTime() +
                                        utcDateTime.getTimezoneOffset() * 60000);
                                    germanDateTime.setHours(germanDateTime.getHours() + 1);

                                    // Format date and time in German time format
                                    let formattedDate =
                                        `${germanDateTime.getDate().toString().padStart(2, '0')}-${(germanDateTime.getMonth() + 1).toString().padStart(2, '0')}-${germanDateTime.getFullYear()}`;
                                    let formattedTime =
                                        `${germanDateTime.getHours().toString().padStart(2, '0')}:${germanDateTime.getMinutes().toString().padStart(2, '0')}`;

                                    if (message.send_id == 1) {
                                        $('.chatting_interface').append(
                                            `<div style="display:inline-block;"><div class="chat_receive_message">${message.message}</div><div class="chat_time">${formattedDate + ' ' + formattedTime}</div></div>`
                                        );
                                        $('.chat_receive_message').last().show();
                                        $('.chat_time').last().show();
                                    } else {
                                        $('.chatting_interface').append(
                                            `<div style="display:inline-block; float:right;"><div class="chat_send_message">${message.message}</div><div class="chat_time">${formattedDate + ' ' + formattedTime}</div></div>`
                                        );
                                        $('.chat_send_message').last().show();
                                        $('.chat_time').last().show();
                                    }
                                });
                            }
                        },
                        error: function() {
                            console.error("Long polling request failed");
                        },
                        complete: function() {
                            veFreelancerlongPollingInProgress = false;
                            setTimeout(veFreelancerGetMessagesLongPolling,
                                1000); // Call the function again after a short delay
                            $('.chatting_interface').scrollTop($('.chatting_interface')[0]
                                .scrollHeight);
                        },
                        dataType: 'json'
                    });
                }
            }

            $('#customer_chatting_start').click(function() {
                customerlongPollingInProgress = false;
                customerLastMessageId = 0;
                $('.chat_send_message').hide();
                $('.chat_receive_message').hide();
                $('.chat_time').hide();
                $.ajax({
                    url: '{{ __('routes.customer-chat-get') }}',
                    type: 'get',
                    success: (result) => {
                        console.log("customer", result);
                        $('#customer_chat_alert').hide();
                        customerGetMessagesLongPolling();
                    },
                    error: () => {
                        console.error("error");
                    }
                })
            })

            $('#admin_chatting_start').click(function() {
                chat_id = '';
                adminlongPollingInProgress = false;
                adminLastMessageId = 0;
                $('.chat_send_message').hide();
                $('.chat_receive_message').hide();
                $('.chat_time').hide();

                $.ajax({
                    url: '{{ __('routes.admin-chat-get') }}',
                    type: 'get',
                    success: (messages) => {
                        console.log("admin", messages);
                        messages.forEach((message) => {
                            chat_id = message.chat_id;
                            if (message.chat_type == 'em_freelancer') {
                                $('.chat_title').text("Vom Stickerei-Freiberufler");
                            } else if (message.chat_type == 've_freelancer') {
                                $('.chat_title').text("Vom Vektor-Freiberufler");
                            } else {
                                $('.chat_title').text(
                                    `Vom Kunden(Kundennummer: ${message.customer_number})`
                                );
                            }
                        });
                        $('#admin_chat_alert').hide();
                        adminGetMessagesLongPolling();
                    },
                    error: () => {
                        console.error("error");
                    }
                })
            })
            $('#em_freelancer_chatting_start').click(function() {
                emFreelancerlongPollingInProgress = false;
                emFreelancerLastMessageId = 0;
                $('.chat_send_message').hide();
                $('.chat_receive_message').hide();
                $('.chat_time').hide();
                $.ajax({
                    url: '{{ __('routes.freelancer-em-chat-get') }}',
                    type: 'get',
                    success: (result) => {
                        console.log("em_freelancer", result);
                        $('#em_freelancer_chat_alert').hide();
                        emFreelancerGetMessagesLongPolling();
                    },
                    error: () => {
                        console.error("error");
                    }
                })
            })
            $('#ve_freelancer_chatting_start').click(function() {
                veFreelancerlongPollingInProgress = false;
                veFreelancerLastMessageId = 0;
                $('.chat_send_message').hide();
                $('.chat_receive_message').hide();
                $('.chat_time').hide();
                $.ajax({
                    url: '{{ __('routes.freelancer-ve-chat-get') }}',
                    type: 'get',
                    success: (result) => {
                        console.log("ve_freelancer", result);
                        $('#ve_freelancer_chat_alert').hide();
                        veFreelancerGetMessagesLongPolling();
                    },
                    error: () => {
                        console.error("error");
                    }
                })
            })































            $('#customer_chat_submit').click(function() {
                if ($('[name=customer_chat_input]').val() != '') {
                    var customer_chat_data = new FormData();
                    customer_chat_data.append('message', $('[name=customer_chat_input]').val());
                    $.ajax({
                        url: '{{ __('routes.customer-chat') }}',
                        type: 'post',
                        data: customer_chat_data,
                        processData: false,
                        contentType: false,
                        success: (result) => {
                            $('[name=customer_chat_input]').val("");
                            $('#customer_chat_submit').css('background-color', '#eee');
                            $('.chat_input').css('height', '36px');
                            $('.chatting_interface').scrollTop($(
                                '.chatting_interface')[
                                0].scrollHeight);
                        },
                        error: () => {
                            console.error("error");
                        }
                    })
                }
            })
            $('#admin_chat_submit').click(function() {
                if ($('[name=admin_chat_input]').val() != '') {
                    var admin_chat_data = new FormData();
                    admin_chat_data.append('message', $('[name=admin_chat_input]').val());
                    admin_chat_data.append('chat_id', chat_id);
                    $.ajax({
                        url: '{{ __('routes.admin-chat') }}',
                        type: 'post',
                        data: admin_chat_data,
                        processData: false,
                        contentType: false,
                        success: (result) => {

                            $('[name=admin_chat_input]').val("");
                            $('#admin_chat_submit').css('background-color', '#eee');
                            $('.chat_input').css('height', '36px');
                            $('.chatting_interface').scrollTop($(
                                '.chatting_interface')[
                                0].scrollHeight);
                        },
                        error: () => {
                            console.error("error");
                        }
                    })
                }
            })
            $('#em_freelancer_chat_submit').click(function() {
                if ($('[name=em_freelancer_chat_input]').val() != '') {
                    var em_free_chat_data = new FormData();
                    em_free_chat_data.append('message', $('[name=em_freelancer_chat_input]').val());
                    $.ajax({
                        url: '{{ __('routes.freelancer-em-chat') }}',
                        type: 'post',
                        data: em_free_chat_data,
                        processData: false,
                        contentType: false,
                        success: (result) => {

                            $('[name=em_freelancer_chat_input]').val("");
                            $('#em_freelancer_chat_submit').css('background-color', '#eee');
                            $('.chat_input').css('height', '36px');
                            $('.chatting_interface').scrollTop($(
                                '.chatting_interface')[
                                0].scrollHeight);
                        },
                        error: () => {
                            console.error("error");
                        }
                    })
                }
            })
            $('#ve_freelancer_chat_submit').click(function() {
                if ($('[name=ve_freelancer_chat_input]').val() != '') {
                    var ve_free_chat_data = new FormData();
                    ve_free_chat_data.append('message', $('[name=ve_freelancer_chat_input]').val());
                    $.ajax({
                        url: '{{ __('routes.freelancer-ve-chat') }}',
                        type: 'post',
                        data: ve_free_chat_data,
                        processData: false,
                        contentType: false,
                        success: (result) => {
                            $('[name=ve_freelancer_chat_input]').val("");
                            $('#ve_freelancer_chat_submit').css('background-color', '#eee');
                            $('.chat_input').css('height', '36px');
                            $('.chatting_interface').scrollTop($(
                                '.chatting_interface')[
                                0].scrollHeight);
                        },
                        error: () => {
                            console.error("error");
                        }
                    })
                }
            })
        })
    </script>
@endauth
