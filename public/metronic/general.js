"use strict";
var KTSigninGeneral = (function () {
    var t, e, r;
    return {
        init: function () {
            (t = document.querySelector("#kt_sign_in_form")),
                    (e = document.querySelector("#kt_sign_in_submit")),
                    (r = FormValidation.formValidation(t, {
                        fields: {
                            email: {
                                validators: {
                                    regexp: {
                                        regexp: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                                        message: "The value is not a valid email address"
                                    },
                                    notEmpty: {
                                        message: "Email address is required"
                                    }
                                }
                            },
                            password: {
                                validators: {
                                    notEmpty: {
                                        message: "The password is required"
                                    }
                                }
                            },
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            bootstrap: new FormValidation.plugins.Bootstrap5({
                                rowSelector: ".fv-row",
                                eleInvalidClass: "",
                                eleValidClass: ""
                            })
                        },
                    })),
                    !(function (t) {
                        try {
                            return new URL(t), !0;
                        } catch (t) {
                            return !1;
                        }
                    })(e.closest("form").getAttribute("action")) ?
                    e.addEventListener("click", function (i) {
                        i.preventDefault(),
                                r.validate().then(function (r) {
                            "Valid" == r
                                    ?
                                    (e.setAttribute("data-kt-indicator", "on"),
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
                                                        customClass: {
                                                            confirmButton: "btn btn-primary"
                                                        }
                                                    });
                                                } else {
                                                    var form = document.getElementById('kt_sign_in_form');
                                                    var formData = new FormData(form);
                                                    var hostUrl = $('input[name="hostUrl"]').val();
                                                    $.ajax({
                                                        url: hostUrl,
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
                                                                            text: "You have successfully logged in!",
                                                                            icon: "success",
                                                                            buttonsStyling: !1,
                                                                            confirmButtonText: "Ok, got it!",
                                                                            customClass: {
                                                                                confirmButton: "btn btn-primary"
                                                                            }
                                                                        }).then(
                                                                        function (e) {
                                                                            if (e.isConfirmed) {
                                                                                
                                                                                location.href = data.url_direct;
                                                                            }
                                                                        }
                                                                );
                                                            } else {
                                                                e.removeAttribute("data-kt-indicator");
                                                                e.removeAttribute("disabled");
                                                                Swal.fire({
                                                                    text: data.msgtxt,
                                                                    icon: "error",
                                                                    buttonsStyling: !1,
                                                                    confirmButtonText: "Ok, got it!",
                                                                    customClass: {
                                                                        confirmButton: "btn btn-primary"
                                                                    }
                                                                })
                                                            }
                                                        },
                                                        error: function () {
                                                            Swal.fire({
                                                                text: "sesuatu yang salah ketika login",
                                                                icon: "error",
                                                                buttonsStyling: !1,
                                                                confirmButtonText: "Ok, got it!",
                                                                customClass: {
                                                                    confirmButton: "btn btn-primary"
                                                                }
                                                            });
                                                            e.removeAttribute("data-kt-indicator");
                                                            e.removeAttribute("disabled");
                                                        }
                                                    });
                                                }
                                            }, 2e3)) :
                                    Swal.fire({
                                        text: "Sorry, looks like there are some errors detected, please try again.",
                                        icon: "error",
                                        buttonsStyling: !1,
                                        confirmButtonText: "Ok, got it!",
                                        customClass: {
                                            confirmButton: "btn btn-primary"
                                        },
                                    });
                        });
                    }) : e.addEventListener("click", function (i) {
                i.preventDefault(),
                        r.validate().then(function (r) {
                    "Valid" == r
                            ?
                            (e.setAttribute("data-kt-indicator", "on"),
                                    (e.disabled = !0),
                                    axios
                                    .post(e.closest("form").getAttribute("action"), new FormData(t))
                                    .then(function (e) {
                                        if (e) {
                                            t.reset(),
                                                    Swal.fire({
                                                        text: "You have successfully logged in!",
                                                        icon: "success",
                                                        buttonsStyling: !1,
                                                        confirmButtonText: "Ok, got it!",
                                                        customClass: {
                                                            confirmButton: "btn btn-primary"
                                                        }
                                                    });
                                            const e = t.getAttribute("data-kt-redirect-url");
                                            e && (location.href = e);
                                        } else {
                                            Swal.fire({
                                                text: "Sorry, the email or password is incorrect, please try again.",
                                                icon: "error",
                                                buttonsStyling: !1,
                                                confirmButtonText: "Ok, got it!",
                                                customClass: {
                                                    confirmButton: "btn btn-primary"
                                                }
                                            });
                                        }
                                    })
                                    .catch(function (t) {
                                        Swal.fire({
                                            text: "Sorry, looks like there are some errors detected, please try again.",
                                            icon: "error",
                                            buttonsStyling: !1,
                                            confirmButtonText: "Ok, got it!",
                                            customClass: {
                                                confirmButton: "btn btn-primary"
                                            },
                                        });
                                    })
                                    .then(() => {
                                        e.removeAttribute("data-kt-indicator"), (e.disabled = !1);
                                    })) :
                            Swal.fire({
                                text: "Sorry, looks like there are some errors detected, please try again.",
                                icon: "error",
                                buttonsStyling: !1,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                },
                            });
                });
            });
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTSigninGeneral.init();
});