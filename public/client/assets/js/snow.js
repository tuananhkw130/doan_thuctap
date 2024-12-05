function createSnow() {
    const snowflake = document.createElement("div");
    snowflake.classList.add("snowflake");

    // Kích thước ngẫu nhiên cho bông tuyết
    const size = Math.random() * 20 + 15; // Kích thước ngẫu nhiên trong khoảng từ 20px đến 50px
    snowflake.style.width = `${size}px`;
    snowflake.style.height = `${size}px`;

    snowflake.style.left = `${Math.random() * 100}vw`;
    snowflake.style.animationDuration = `${Math.random() * 5 + 6}s`;

    document.body.appendChild(snowflake);

    setTimeout(() => {
        snowflake.remove();
    }, 5000);
}

setInterval(createSnow, 400);
