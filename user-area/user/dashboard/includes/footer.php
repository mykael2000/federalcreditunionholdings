<footer class="main-footer" style="bottom: 0; position: relative;">

    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        <a href="../../user/logout">Sign Out</a>
    </div>
    <!-- Default to the left -->
    <div style="text-align: center;">© 2022. All rights reserved by Federal Credit Union Holdings</div>
</footer>


<script src="../../assets/dashboard/bower_components/jquery/dist/jquery.min.js"></script>
<script src="../../assets/dashboard/bower_components/popper.js/dist/umd/popper.min.js"></script>
<script src="../../assets/dashboard/bower_components/moment/moment.js"></script>
<script src="../../assets/dashboard/bower_components/chart.js/dist/Chart.min.js"></script>
<script src="../../assets/dashboard/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="../../assets/dashboard/bower_components/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
<script src="../../assets/dashboard/bower_components/bootstrap-validator/dist/validator.min.js"></script>
<script src="../../assets/dashboard/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="../../assets/dashboard/bower_components/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
<script src="../../assets/dashboard/bower_components/dropzone/dist/dropzone.js"></script>
<script src="../../assets/dashboard/bower_components/editable-table/mindmup-editabletable.js"></script>
<script src="../../assets/dashboard/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../assets/dashboard/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="../../assets/dashboard/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="../../assets/dashboard/bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"></script>
<script src="../../assets/dashboard/bower_components/tether/dist/js/tether.min.js"></script>
<script src="../../assets/dashboard/bower_components/slick-carousel/slick/slick.min.js"></script>
<script src="../../assets/dashboard/bower_components/bootstrap/util.js"></script>
<script src="../../assets/dashboard/bower_components/bootstrap/alert.js"></script>
<script src="../../assets/dashboard/bower_components/bootstrap/button.js"></script>
<script src="../../assets/dashboard/bower_components/bootstrap/carousel.js"></script>
<script src="../../assets/dashboard/bower_components/bootstrap/collapse.js"></script>
<script src="../../assets/dashboard/bower_components/bootstrap/dropdown.js"></script>
<script src="../../assets/dashboard/bower_components/bootstrap/modal.js"></script>
<script src="../../assets/dashboard/bower_components/bootstrap/tab.js"></script>
<script src="../../assets/dashboard/bower_components/bootstrap/tooltip.js"></script>
<script src="../../assets/dashboard/bower_components/bootstrap/popover.js"></script>
<script src="../../assets/dashboard/js/demo_customizer5739.js?version=4.5.0"></script>
<script src="../../assets/dashboard/js/main5739.js?version=4.5.4"></script>

<script src="../../assets/dashboard/js/clipboard.min.js"></script>
<script>
var clipboard = new ClipboardJS('.btn-copy');

clipboard.on('success', function(e) {
    console.log(e);
    alert('Copied successfully');
});

clipboard.on('error', function(e) {
    console.log(e);
});
</script>
<script type="text/javascript" src="../../assets/plugins/toastr/toastr.min.js?xx"></script>

<script type="text/javascript">
$(document).ready(function() {
    $("a[id='tab-overview']").click(function() {
        $('#card-overview').show();
        $('#card-request').hide();
    });
    $("a[id='tab-request']").click(function() {
        $('#card-overview').hide();
        $('#card-request').show();
    });
    $("a[id='tab-overview']").click(function() {
        $('#loan-overview').show();
        $('#loan-request').hide();
    });
    $("a[id='tab-request']").click(function() {
        $('#loan-overview').hide();
        $('#loan-request').show();
    });
});
</script>
<script type="text/javascript">
$(function() {
    function card_request(data) {
        if (data.result == 'success') {
            $('#form-response').html(data.message);
            $('#form-response').show();
            $('#cardform').hide();

        } else {
            $('#form-response-err').html(data.message);
            $('#form-response-err').show();

            //reverse the response on the button
            $('button[type="submit"]', $form).each(function() {
                $btn = $(this);
                label = $btn.prop('orig_label');
                if (label) {
                    $btn.prop('type', 'submit');
                    $btn.text(label);
                    $btn.prop('orig_label', '');
                }
            });

        } //else
    }

    $('#card_request').submit(function(e) {
        e.preventDefault();

        $form = $(this);
        //show some response on the button
        $('button[type="submit"]', $form).each(function() {
            $btn = $(this);
            $btn.prop('type', 'submit');
            $btn.prop('orig_label', $btn.text());
            $btn.html(
                '<span class="fa fa-spinner fa-spin " role="status" aria-hidden="true"></span>'
            );

        });


        $.ajax({
            type: "POST",
            url: '../../update/card/request',
            data: $form.serialize(),
            success: card_request,
            dataType: 'json'
        });

    });


    function loan_request(data) {
        if (data.result == 'success') {
            $('#form-response').html(data.message);
            $('#form-response').show();
            $('#loanform').hide();

        } else {
            $('#form-response-err').html(data.message);
            $('#form-response-err').show();

            //reverse the response on the button
            $('button[type="submit"]', $form).each(function() {
                $btn = $(this);
                label = $btn.prop('orig_label');
                if (label) {
                    $btn.prop('type', 'submit');
                    $btn.text(label);
                    $btn.prop('orig_label', '');
                }
            });

        } //else
    }

    $('#loan_request').submit(function(e) {
        e.preventDefault();

        $form = $(this);
        //show some response on the button
        $('button[type="submit"]', $form).each(function() {
            $btn = $(this);
            $btn.prop('type', 'submit');
            $btn.prop('orig_label', $btn.text());
            $btn.html(
                '<span class="fa fa-spinner fa-spin " role="status" aria-hidden="true"></span>'
            );

        });


        $.ajax({
            type: "POST",
            url: '../../update/loan/request',
            data: $form.serialize(),
            success: loan_request,
            dataType: 'json'
        });

    });
});

$(document).ready(function() {


    $("input[id='two-factor']").click(function() {
        var tValue = $("input[id='two-factor']:checked").length > 0;
        if (tValue) {
            $.ajax({
                type: "GET",
                url: "../../update/account_settings/two-factor/1"
            }).done(function(data) {
                toastr.success(
                    '<em class="ti ti-check toast-message-icon"></em> Two-Factor Verification Enabled'
                );
            });


        } else {
            $.ajax({
                type: "GET",
                url: "../../update/account_settings/two-factor/0"
            }).done(function(data) {
                toastr.success(
                    '<em class="ti ti-alert toast-message-icon"></em> Two-Factor Verification Disabled'
                );
            });

        }

    });
    $("input[id='email-notice']").click(function() {
        var tValue = $("input[id='email-notice']:checked").length > 0;
        if (tValue) {
            $.ajax({
                type: "GET",
                url: "../../update/account_settings/email-notice/1"
            }).done(function(data) {
                toastr.success(
                    '<em class="ti ti-check toast-message-icon"></em>  Changes saved successfully'
                );
            });


        } else {
            $.ajax({
                type: "GET",
                url: "../../update/account_settings/email-notice/0"
            }).done(function(data) {
                toastr.success(
                    '<em class="ti ti-alert toast-message-icon"></em> Changes saved successfully'
                );
            });

        }

    });

    $("input[id='logins-notice']").click(function() {
        var tValue = $("input[id='logins-notice']:checked").length > 0;
        if (tValue) {
            $.ajax({
                type: "GET",
                url: "../../update/account_settings/logins-notice/1"
            }).done(function(data) {
                toastr.success(
                    '<em class="ti ti-check toast-message-icon"></em>  Changes saved successfully'
                );
            });


        } else {
            $.ajax({
                type: "GET",
                url: "../../update/account_settings/logins-notice/0"
            }).done(function(data) {
                toastr.success(
                    '<em class="ti ti-alert toast-message-icon"></em> LChanges saved successfully'
                );
            });

        }

    });

    $("input[id='trans-notice']").click(function() {
        var tValue = $("input[id='trans-notice']:checked").length > 0;
        if (tValue) {
            $.ajax({
                type: "GET",
                url: "../../update/account_settings/trans-notice/1"
            }).done(function(data) {
                toastr.success(
                    '<em class="ti ti-check toast-message-icon"></em>  Changes saved successfully'
                );
            });


        } else {
            $.ajax({
                type: "GET",
                url: "../../update/account_settings/trans-notice/0"
            }).done(function(data) {
                toastr.success(
                    '<em class="ti ti-alert toast-message-icon"></em> Changes saved successfully'
                );
            });

        }

    });

    //update session time
    $("button[id='btn-session-time']").click(function() {

        var tValue = $("select#session-time option:selected").val();
        if (tValue != '') {
            $('#btn-session-time').html(
                '<span class="fa fa-spinner fa-spin " role="status" aria-hidden="true"></span> ');
            $.ajax({
                type: "GET",
                url: "../../update/account_settings/session/" + tValue
            }).done(function(data) {
                var resp = jQuery.parseJSON(data);
                $('#btn-session-time').html('CHANGE');
                if (resp.result == 'success') {
                    toastr.success(resp.message);
                    $('#btn-session-time').html('Saved');
                } else {
                    toastr.success(resp.message);
                    $('#btn-session-time').html('CHANGE');
                }
            });


        }
    });

    $('.terminate-btn').on('click', function() {
        var terminate_id = $(this).attr('id');


        $('#' + terminate_id).html(
            '<span class="fa fa-spinner fa-spin " role="status" aria-hidden="true"></span> ');
        $.ajax({
            type: "GET",
            url: "../../update/account_settings/session-terminate/" + terminate_id
        }).done(function(data) {

            var resp = jQuery.parseJSON(data);
            $('#' + terminate_id).html('Terminated');
            if (resp.result == 'success') {
                toastr.success(resp.message);
            } else {
                toastr.error(resp.message);
            }


        });
    });

    function change_pswd(data) {
        if (data.result == 'success') {
            $('#result_msg').html(data.message);
            $('#result_msg').show();
            //reverse the response on the button
            $('button[type="button"]', $form).each(function() {
                $btn = $(this);
                label = $btn.prop('orig_label');
                if (label) {
                    $btn.prop('type', 'submit');
                    $btn.text(label);
                    $btn.prop('orig_label', '');
                }
            });

        } else {

            $('#result_msg').html(data.message);
            $('#result_msg').show();
            //reverse the response on the button
            $('button[type="button"]', $form).each(function() {
                $btn = $(this);
                label = $btn.prop('orig_label');
                if (label) {
                    $btn.prop('type', 'submit');
                    $btn.text(label);
                    $btn.prop('orig_label', '');
                }
            });

        } //else
    }

    $('#change_pswd').submit(function(e) {
        e.preventDefault();

        $form = $(this);
        //show some response on the button
        $('button[type="submit"]', $form).each(function() {
            $btn = $(this);
            $btn.prop('type', 'button');
            $btn.prop('orig_label', $btn.text());
            $btn.html(
                '<span class="fa fa-spinner fa-spin " role="status" aria-hidden="true"></span> '
            );

        });


        $.ajax({
            type: "POST",
            url: '../../update/change_password',
            data: $form.serialize(),
            success: change_pswd,
            dataType: 'json'
        });

    });

    function new_pin(data) {
        if (data.result == 'success') {
            $('#result_msgp').html(data.message);
            $('#result_msgp').show();
            //reverse the response on the button
            $('button[type="button"]', $form).each(function() {
                $btn = $(this);
                label = $btn.prop('orig_label');
                if (label) {
                    $btn.prop('type', 'submit');
                    $btn.text(label);
                    $btn.prop('orig_label', '');
                }
            });

        } else {

            $('#result_msgp').html(data.message);
            $('#result_msgp').show();
            //reverse the response on the button
            $('button[type="button"]', $form).each(function() {
                $btn = $(this);
                label = $btn.prop('orig_label');
                if (label) {
                    $btn.prop('type', 'submit');
                    $btn.text(label);
                    $btn.prop('orig_label', '');
                }
            });

        } //else
    }

    $('#new_pin').submit(function(e) {
        e.preventDefault();

        $form = $(this);
        //show some response on the button
        $('button[type="submit"]', $form).each(function() {
            $btn = $(this);
            $btn.prop('type', 'button');
            $btn.prop('orig_label', $btn.text());
            $btn.html(
                '<span class="fa fa-spinner fa-spin " role="status" aria-hidden="true"></span> '
            );

        });


        $.ajax({
            type: "POST",
            url: '../../update/change_pin/new',
            data: $form.serialize(),
            success: new_pin,
            dataType: 'json'
        });

    });

    function change_pin(data) {
        if (data.result == 'success') {
            $('#result_msgp').html(data.message);
            $('#result_msgp').show();
            //reverse the response on the button
            $('button[type="button"]', $form).each(function() {
                $btn = $(this);
                label = $btn.prop('orig_label');
                if (label) {
                    $btn.prop('type', 'submit');
                    $btn.text(label);
                    $btn.prop('orig_label', '');
                }
            });

        } else {

            $('#result_msgp').html(data.message);
            $('#result_msgp').show();
            //reverse the response on the button
            $('button[type="button"]', $form).each(function() {
                $btn = $(this);
                label = $btn.prop('orig_label');
                if (label) {
                    $btn.prop('type', 'submit');
                    $btn.text(label);
                    $btn.prop('orig_label', '');
                }
            });

        } //else
    }

    $('#change_pin').submit(function(e) {
        e.preventDefault();

        $form = $(this);
        //show some response on the button
        $('button[type="submit"]', $form).each(function() {
            $btn = $(this);
            $btn.prop('type', 'button');
            $btn.prop('orig_label', $btn.text());
            $btn.html(
                '<span class="fa fa-spinner fa-spin " role="status" aria-hidden="true"></span> '
            );

        });


        $.ajax({
            type: "POST",
            url: '../../update/change_pin',
            data: $form.serialize(),
            success: change_pin,
            dataType: 'json'
        });

    });

    function forgot_pin(data) {
        if (data.result == 'success') {
            $('#form-response').html(data.message);
            $('#form-response').show();
            $('#forgotpin-form').hide();

        } else {
            $('#form-response-err').html(data.message);
            $('#form-response-err').show();

            //reverse the response on the button
            $('button[type="submit"]', $form).each(function() {
                $btn = $(this);
                label = $btn.prop('orig_label');
                if (label) {
                    $btn.prop('type', 'submit');
                    $btn.text(label);
                    $btn.prop('orig_label', '');
                }
            });

        } //else
    }

    $('#forgotpin_form').submit(function(e) {
        e.preventDefault();

        $form = $(this);
        //show some response on the button
        $('button[type="submit"]', $form).each(function() {
            $btn = $(this);
            $btn.prop('type', 'submit');
            $btn.prop('orig_label', $btn.text());
            $btn.html('loading ...');

        });


        $.ajax({
            type: "POST",
            url: '../../update/forgot_pin',
            data: $form.serialize(),
            success: forgot_pin,
            dataType: 'json'
        });

    });

    function change_question(data) {
        if (data.result == 'success') {
            $('#result_msg').html(data.message);
            $('#result_msg').show();
            //reverse the response on the button
            $('button[type="button"]', $form).each(function() {
                $btn = $(this);
                label = $btn.prop('orig_label');
                if (label) {
                    $btn.prop('type', 'submit');
                    $btn.text(label);
                    $btn.prop('orig_label', '');
                }
            });

        } else {

            $('#result_msg').html(data.message);
            $('#result_msg').show();
            //reverse the response on the button
            $('button[type="button"]', $form).each(function() {
                $btn = $(this);
                label = $btn.prop('orig_label');
                if (label) {
                    $btn.prop('type', 'submit');
                    $btn.text(label);
                    $btn.prop('orig_label', '');
                }
            });

        } //else
    }

    $('#change_question').submit(function(e) {
        e.preventDefault();

        $form = $(this);
        //show some response on the button
        $('button[type="submit"]', $form).each(function() {
            $btn = $(this);
            $btn.prop('type', 'button');
            $btn.prop('orig_label', $btn.text());
            $btn.html(
                '<span class="fa fa-spinner fa-spin " role="status" aria-hidden="true"></span> '
            );

        });


        $.ajax({
            type: "POST",
            url: '../../update/change_question',
            data: $form.serialize(),
            success: change_question,
            dataType: 'json'
        });

    });
});
</script>
<script type="text/javascript">
function googleTranslateElementInit() {
    new google.translate.TranslateElement({
        pageLanguage: 'en'
    }, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
</script>
<script src="//code.tidio.co/efkhimfwpfr5zpbldcx6na4c74r7b3jr.js" async></script>
</body>

</html>