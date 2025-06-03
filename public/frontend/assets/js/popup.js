const popup = document.getElementById("popup");
const overlay = document.getElementById("overlay");

function openPopup() {
    popup.style.display = "block";
    overlay.style.display = "block";
    setTimeout(() => {
        popup.classList.add("show");
        overlay.classList.add("show");
    }, 10);
}

// Mở popup cho nút có class get-advice
document.querySelectorAll(".btn-get-advice").forEach((button) => {
    button.addEventListener("click", function (e) {
        e.preventDefault();
        let id = this.dataset.id || "";
        document.getElementById("product_id").value = id;
        openPopup();
    });
});

document.getElementById("closePopup").addEventListener("click", function () {
    popup.classList.remove("show");
    overlay.classList.remove("show");
    setTimeout(() => {
        popup.style.display = "none";
        overlay.style.display = "none";
    }, 300);
});

document.getElementById("submitBtn").addEventListener("click", function () {
    const inputs = popup.querySelectorAll("input");
    const form = document.getElementById("adviceForm");
    let isValid = true;

    inputs.forEach((input) => {
        const errorSpan = input.nextElementSibling;
        let errorMessage = "";

        // Xử lý validate theo tên field
        if (input.name == "name") {
            if (!input.value.trim()) {
                errorMessage = "Tên không được bỏ trống.";
            }
        }

        if (input.name == "email") {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!input.value.trim()) {
                errorMessage = "Email không được bỏ trống.";
            } else if (!emailRegex.test(input.value.trim())) {
                errorMessage = "Email không hợp lệ.";
            }
        }

        if (input.name == "phone") {
            const phoneRegex = /^[0-9]{9,11}$/;
            if (!input.value.trim()) {
                errorMessage = "Số điện thoại không được bỏ trống.";
            } else if (!phoneRegex.test(input.value.trim())) {
                errorMessage = "Số điện thoại không hợp lệ.";
            }
        }

        // Hiển thị lỗi hoặc ẩn lỗi
        if (errorSpan && errorSpan.classList.contains("error-message")) {
            if (errorMessage) {
                errorSpan.textContent = errorMessage;
                errorSpan.style.display = "block";
                isValid = false;
            } else {
                errorSpan.style.display = "none";
            }
        }
    });

    if (isValid) {
        const formData = new FormData(form);

        fetch(form.action, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
            body: formData,
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    Swal.fire({
                        title: "Đăng ký thành công!",
                        icon: "success",
                        confirmButtonText: "OK",
                    }).then(() => {
                        popup.classList.remove("show");
                        overlay.classList.remove("show");
                        setTimeout(() => {
                            popup.style.display = "none";
                            overlay.style.display = "none";
                            form.reset();
                        }, 300);
                    });
                } else {
                    alert("Có lỗi xảy ra. Vui lòng thử lại 2.");
                }
            })
            .catch((error) => {
                console.error("Error:", error);
                alert("Có lỗi xảy ra. Vui lòng thử lại 3.");
            });
    }
});
