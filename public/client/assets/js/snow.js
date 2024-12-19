function createSnow() {
    const snowflake = document.createElement("div");
    snowflake.classList.add("snowflake");

    const size = Math.random() * 10 + 10;
    snowflake.style.width = `${size}px`;
    snowflake.style.height = `${size}px`;

    snowflake.style.left = `${Math.random() * 100}vw`;
    snowflake.style.animationDuration = `${Math.random() * 5 + 6}s`;

    document.body.appendChild(snowflake);

    setTimeout(() => {
        snowflake.remove();
    }, 7000);
}

setInterval(createSnow, 400);
