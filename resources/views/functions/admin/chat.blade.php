@auth
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
    <script>
        $(function() {
            var chat_id;
            var customer_chatting_display = false;
            var em_freelancer_chatting_display = false;
            var ve_freelancer_chatting_display = false;
            var admin_chatting_display = false;
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
            $('#customer_chatting_close').click(function() {
                customer_chatting_display = false;
            })
            $('#em_freelancer_chatting_close').click(function() {
                em_freelancer_chatting_display = false;
            })
            $('#ve_freelancer_chatting_close').click(function() {
                ve_freelancer_chatting_display = false;
            })
            $('#admin_chatting_close').click(function() {
                admin_chatting_display = false;
            })

            admin_chatting_scroll = true;
            customer_chatting_scroll = true;
            em_freelancer_chatting_scroll = true;
            ve_freelancer_chatting_scroll = true;
            var currentScrollPosition;

            function showScrollPosition() {
                currentScrollPosition = $('.chatting_interface').scrollTop();
            }

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
                            let message = result.message;
                            message = message.replace(/\n/g, "<br>");
                            // Convert UTC time to UTC+1 time zone
                            let utcDateTime = new Date(result.created_at);
                            let germanDateTime = new Date(utcDateTime.getTime() +
                                utcDateTime.getTimezoneOffset() * 60000);
                            germanDateTime.setHours(germanDateTime.getHours() + 1);

                            // Format date and time in German time format
                            let formattedDate =
                                `${germanDateTime.getDate().toString().padStart(2, '0')}-${(germanDateTime.getMonth() + 1).toString().padStart(2, '0')}-${germanDateTime.getFullYear()}`;
                            let formattedTime =
                                `${germanDateTime.getHours().toString().padStart(2, '0')}:${germanDateTime.getMinutes().toString().padStart(2, '0')}`;

                            $('.chatting_interface').append(
                                `<div style="display:inline-block; float:right;"><div class="chat_send_message">${message}</div><div class="chat_time">${formattedDate + ' ' + formattedTime}</div></div>`
                            );
                            $('.chat_send_message').last().show();
                            $('.chat_time').last().show();
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

            $('#customer_chatting_start').click(function() {
                showScrollPosition();
                $('.chat_send_message').hide();
                $('.chat_receive_message').hide();
                $('.chat_time').hide();
                $.ajax({
                    url: '{{ __('routes.customer-chat-get') }}',
                    type: 'get',
                    success: (result) => {
                        if (result != '') {
                            var messages = result.reverse();
                            messages.forEach((message) => {
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
                            $('#customer_chat_alert').hide();
                            customer_chatting_display = true;
                            setTimeout(() => {
                                if (customer_chatting_display) {
                                    $('#customer_chatting_start').trigger('click');
                                    // customer_chatting_scroll = false;
                                }
                            }, 8000);
                            if (customer_chatting_scroll) {
                                $('.chatting_interface').scrollTop($('.chatting_interface')[0]
                                    .scrollHeight);
                            } else {
                                $('.chatting_interface').scrollTop(currentScrollPosition);
                            }
                        }
                    },
                    error: () => {
                        console.error("error");
                    }
                })
            })

            $('#admin_chatting_start').click(function() {
                showScrollPosition();
                chat_id = '';
                $('.chat_send_message').hide();
                $('.chat_receive_message').hide();
                $('.chat_time').hide();

                $.ajax({
                    url: '{{ __('routes.admin-chat-get') }}',
                    type: 'get',
                    success: (messages) => {
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
                        $('#admin_chat_alert').hide();
                        admin_chatting_display = true;

                        setTimeout(() => {
                            if (admin_chatting_display) {
                                $('#admin_chatting_start').trigger('click');
                                // admin_chatting_scroll = false;
                            }
                        }, 8000);

                        if (admin_chatting_scroll) {
                            $('.chatting_interface').scrollTop($('.chatting_interface')[0]
                                .scrollHeight);
                        } else {
                            $('.chatting_interface').scrollTop(currentScrollPosition);
                        }
                    },
                    error: () => {
                        console.error("error");
                    }
                })
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
                            let message = result.message;
                            message = message.replace(/\n/g, "<br>");
                            // Convert UTC time to UTC+1 time zone
                            let utcDateTime = new Date(result.created_at);
                            let germanDateTime = new Date(utcDateTime.getTime() +
                                utcDateTime.getTimezoneOffset() * 60000);
                            germanDateTime.setHours(germanDateTime.getHours() + 1);

                            // Format date and time in German time format
                            let formattedDate =
                                `${germanDateTime.getDate().toString().padStart(2, '0')}-${(germanDateTime.getMonth() + 1).toString().padStart(2, '0')}-${germanDateTime.getFullYear()}`;
                            let formattedTime =
                                `${germanDateTime.getHours().toString().padStart(2, '0')}:${germanDateTime.getMinutes().toString().padStart(2, '0')}`;

                            $('.chatting_interface').append(
                                `<div style="display:inline-block; float:right;"><div class="chat_send_message">${message}</div><div class="chat_time">${formattedDate + ' ' + formattedTime}</div></div>`
                            );
                            $('.chat_send_message').last().show();
                            $('.chat_time').last().show();
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
            $('#em_freelancer_chatting_start').click(function() {
                showScrollPosition();
                $('.chat_send_message').hide();
                $('.chat_receive_message').hide();
                $('.chat_time').hide();
                $.ajax({
                    url: '{{ __('routes.freelancer-em-chat-get') }}',
                    type: 'get',
                    success: (result) => {
                        if (result != '') {
                            var messages = result.reverse();
                            messages.forEach((message) => {
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
                            $('#em_freelancer_chat_alert').hide();
                            em_freelancer_chatting_display = true;
                            setTimeout(() => {
                                if (em_freelancer_chatting_display) {
                                    $('#em_freelancer_chatting_start').trigger('click');
                                    // em_freelancer_chatting_scroll = false;
                                }
                            }, 8000);
                            if (em_freelancer_chatting_scroll) {
                                $('.chatting_interface').scrollTop($('.chatting_interface')[0]
                                    .scrollHeight);
                            } else {
                                $('.chatting_interface').scrollTop(currentScrollPosition);
                            }
                        }
                    },
                    error: () => {
                        console.error("error");
                    }
                })
            })
            $('#ve_freelancer_chatting_start').click(function() {
                showScrollPosition();
                $('.chat_send_message').hide();
                $('.chat_receive_message').hide();
                $('.chat_time').hide();
                $.ajax({
                    url: '{{ __('routes.freelancer-ve-chat-get') }}',
                    type: 'get',
                    success: (result) => {
                        if (result != '') {
                            var messages = result.reverse();
                            messages.forEach((message) => {
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
                            $('#ve_freelancer_chat_alert').hide();
                            ve_freelancer_chatting_display = true;
                            setTimeout(() => {
                                if (ve_freelancer_chatting_display) {
                                    $('#ve_freelancer_chatting_start').trigger('click');
                                    // ve_freelancer_chatting_scroll = false;
                                }
                            }, 8000);
                            if (ve_freelancer_chatting_scroll) {
                                $('.chatting_interface').scrollTop($('.chatting_interface')[0]
                                    .scrollHeight);
                            } else {
                                $('.chatting_interface').scrollTop(currentScrollPosition);
                            }
                        }
                    },
                    error: () => {
                        console.error("error");
                    }
                })
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
                            let message = result.message;
                            message = message.replace(/\n/g, "<br>");
                            // Convert UTC time to UTC+1 time zone
                            let utcDateTime = new Date(result.created_at);
                            let germanDateTime = new Date(utcDateTime.getTime() +
                                utcDateTime.getTimezoneOffset() * 60000);
                            germanDateTime.setHours(germanDateTime.getHours() + 1);

                            // Format date and time in German time format
                            let formattedDate =
                                `${germanDateTime.getDate().toString().padStart(2, '0')}-${(germanDateTime.getMonth() + 1).toString().padStart(2, '0')}-${germanDateTime.getFullYear()}`;
                            let formattedTime =
                                `${germanDateTime.getHours().toString().padStart(2, '0')}:${germanDateTime.getMinutes().toString().padStart(2, '0')}`;

                            $('.chatting_interface').append(
                                `<div style="display:inline-block; float:right;"><div class="chat_send_message">${message}</div><div class="chat_time">${formattedDate + ' ' + formattedTime}</div></div>`
                            );
                            $('.chat_send_message').last().show();
                            $('.chat_time').last().show();
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
                            let message = result.message;
                            message = message.replace(/\n/g, "<br>");
                            // Convert UTC time to UTC+1 time zone
                            let utcDateTime = new Date(result.created_at);
                            let germanDateTime = new Date(utcDateTime.getTime() +
                                utcDateTime.getTimezoneOffset() * 60000);
                            germanDateTime.setHours(germanDateTime.getHours() + 1);

                            // Format date and time in German time format
                            let formattedDate =
                                `${germanDateTime.getDate().toString().padStart(2, '0')}-${(germanDateTime.getMonth() + 1).toString().padStart(2, '0')}-${germanDateTime.getFullYear()}`;
                            let formattedTime =
                                `${germanDateTime.getHours().toString().padStart(2, '0')}:${germanDateTime.getMinutes().toString().padStart(2, '0')}`;

                            $('.chatting_interface').append(
                                `<div style="display:inline-block; float:right;"><div class="chat_send_message">${message}</div><div class="chat_time">${formattedDate + ' ' + formattedTime}</div></div>`
                            );
                            $('.chat_send_message').last().show();
                            $('.chat_time').last().show();
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
