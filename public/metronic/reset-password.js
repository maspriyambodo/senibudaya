"use strict";
var KTAuthResetPassword = (function () {
    var t, e, r;
    return {
        init: function () {
            (t = document.querySelector("#kt_password_reset_form")),
                    (e = document.querySelector("#kt_password_reset_submit")),
                    (r = FormValidation.formValidation(t, {
                        fields: {email: {validators: {regexp: {regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/, message: "The value is not a valid email address"}, notEmpty: {message: "Email address is required"}}}},
                        plugins: {trigger: new FormValidation.plugins.Trigger(), bootstrap: new FormValidation.plugins.Bootstrap5({rowSelector: ".fv-row", eleInvalidClass: "", eleValidClass: ""})},
                    })),
                    !(function (t) {
                        try {
                            return new URL(t), !0;
                        } catch (t) {
                            return !1;
                        }
                    })(t.getAttribute("action"))
                    ? e.addEventListener("click", function (i) {
                        i.preventDefault(),
                                r.validate().then(function (r) {
                            "Valid" == r
                                    ? (e.setAttribute("data-kt-indicator", "on"),
                                            (e.disabled = !0),
                                            setTimeout(function () {
                                                if (grecaptcha.getResponse().length < 1) {
                                                    e.removeAttribute("data-kt-indicator");
                                                    e.removeAttribute("disabled");
                                                    Swal.fire({
                                                        text: "Please validate the Google reCaptcha.",
                                                        icon: "error",
                                                        buttonsStyling: !1,
                                                        confirmButtonText: "Ok, got it!",
                                                        allowOutsideClick: false,
                                                        customClass: {
                                                            confirmButton: "btn btn-primary"
                                                        }
                                                    });
                                                } else {
                                                    var form = document.getElementById('kt_password_reset_form');
                                                    var formData = new FormData(form);
                                                    var r = t.getAttribute("data-kt-redirect-url");
                                                    $.ajax({
                                                        url: r,
                                                        type: "POST",
                                                        data: formData,
                                                        cache: false,
                                                        contentType: false,
                                                        processData: false,
                                                        dataType: "JSON",
                                                        success: function (data) {
                                                            if (data.stat) {
                                                                e.removeAttribute("data-kt-indicator"),
                                                                        (e.disabled = !1),
                                                                        Swal.fire({
                                                                            text: "We have send a password reset link to your email.",
                                                                            icon: "success",
                                                                            buttonsStyling: !1,
                                                                            confirmButtonText: "Ok",
                                                                            allowOutsideClick: false,
                                                                            customClass: {
                                                                                confirmButton: "btn btn-primary"
                                                                            }
                                                                        }).then(function () {
                                                                    location.href = data.url_direct;
                                                                });
                                                            } else {
                                                                e.removeAttribute("data-kt-indicator");
                                                                e.removeAttribute("disabled");
                                                                Swal.fire({
                                                                    text: data.msgtxt,
                                                                    icon: "error",
                                                                    buttonsStyling: !1,
                                                                    confirmButtonText: "Ok, got it!",
                                                                    allowOutsideClick: false,
                                                                    customClass: {
                                                                        confirmButton: "btn btn-primary"
                                                                    }
                                                                });
                                                            }
                                                        },
                                                        error: function () {
                                                            Swal.fire({
                                                                text: "kesalahan sistem, errcode: 07081543",
                                                                icon: "error",
                                                                buttonsStyling: !1,
                                                                confirmButtonText: "Ok",
                                                                allowOutsideClick: false,
                                                                customClass: {
                                                                    confirmButton: "btn btn-primary"
                                                                }
                                                            });
                                                        }
                                                    });
                                                }

                                            }, 1500))
                                    : Swal.fire({
                                        text: "Sorry, looks like there are some errors detected, please try again.",
                                        icon: "error",
                                        buttonsStyling: !1,
                                        confirmButtonText: "Ok, got it!",
                                        allowOutsideClick: false,
                                        customClass: {confirmButton: "btn btn-primary"},
                                    });
                        });
                    })
                    : e.addEventListener("click", function (i) {
                        i.preventDefault(),
                                r.validate().then(function (r) {
                            "Valid" == r
                                    ? (e.setAttribute("data-kt-indicator", "on"),
                                            (e.disabled = !0),
                                            axios
                                            .post(e.closest("form").getAttribute("action"), new FormData(t))
                                            .then(function (e) {
                                                if (e) {
                                                    t.reset(),
                                                            Swal.fire({
                                                                text: "We have send a password reset link to your email.",
                                                                icon: "success",
                                                                buttonsStyling: !1,
                                                                confirmButtonText: "Ok, got it!",
                                                                allowOutsideClick: false,
                                                                customClass: {confirmButton: "btn btn-primary"},
                                                            });
                                                    const e = t.getAttribute("data-kt-redirect-url");
                                                    e && (location.href = e);
                                                } else
                                                    Swal.fire({text: "Sorry, the email is incorrect, please try again.", icon: "error", buttonsStyling: !1, confirmButtonText: "Ok, got it!",allowOutsideClick: false, customClass: {confirmButton: "btn btn-primary"}});
                                            })
                                            .catch(function (t) {
                                                Swal.fire({
                                                    text: "Sorry, looks like there are some errors detected, please try again.",
                                                    icon: "error",
                                                    buttonsStyling: !1,
                                                    confirmButtonText: "Ok, got it!",
                                                    allowOutsideClick: false,
                                                    customClass: {confirmButton: "btn btn-primary"},
                                                });
                                            })
                                            .then(() => {
                                                e.removeAttribute("data-kt-indicator"), (e.disabled = !1);
                                            }))
                                    : Swal.fire({
                                        text: "Sorry, looks like there are some errors detected, please try again.",
                                        icon: "error",
                                        buttonsStyling: !1,
                                        confirmButtonText: "Ok, got it!",
                                        allowOutsideClick: false,
                                        customClass: {confirmButton: "btn btn-primary"},
                                    });
                        });
                    });
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTAuthResetPassword.init();
});
