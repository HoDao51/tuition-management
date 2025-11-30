document.addEventListener("DOMContentLoaded", () => {
        const loader = document.getElementById("page-loader");
        // Ẩn loader khi vừa load trang
        loader.classList.add("hidden");
        // Khi chuyển trang bằng link
        document.querySelectorAll("a[href]").forEach(link => {
            link.addEventListener("click", (e) => {
                const href = link.getAttribute("href");
                if (!href || href.startsWith("#") || href.startsWith("javascript")) return;
                loader.classList.remove("hidden");
            });
        });
        // Khi submit form
        document.querySelectorAll("form").forEach(form => {
            form.addEventListener("submit", () => {
                loader.classList.remove("hidden");
            });
        });
    });