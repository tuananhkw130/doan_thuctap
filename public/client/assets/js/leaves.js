function createLeaf() {
    const leaf = document.createElement("div");
    leaf.classList.add("leaf");

    // Kích thước ngẫu nhiên cho lá
    const size = Math.random() * 30 + 20; // Kích thước ngẫu nhiên trong khoảng từ 20px đến 50px
    leaf.style.width = `${size}px`;
    leaf.style.height = `${size}px`;

    leaf.style.left = `${Math.random() * 100}vw`;
    leaf.style.animationDuration = `${Math.random() * 3 + 3}s`;

    document.body.appendChild(leaf);

    setTimeout(() => {
        leaf.remove();
    }, 7000);
}

setInterval(createLeaf, 300);
