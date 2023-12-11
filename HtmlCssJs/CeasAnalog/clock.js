// Get the canvas element and context
const canvas = document.getElementById("clockCanvas");
const ctx = canvas.getContext("2d");

// Set the center point of the clock
const centerX = canvas.width / 2;
const centerY = canvas.height / 2;

function drawClock() {
    // Clear the canvas
    ctx.clearRect(0, 0, canvas.width, canvas.height);

    // Draw the clock circle
    ctx.beginPath();
    ctx.arc(centerX, centerY, 150, 0, 2 * Math.PI);
    ctx.stroke();

    // Get the current time
    const now = new Date();
    const hours = now.getHours() % 12;
    const minutes = now.getMinutes();
    const seconds = now.getSeconds();

    // Draw clock hands
    drawHand(hours * 30 + minutes * 0.5, 70, 5, "black");  // Hour hand
    drawHand(minutes * 6, 100, 3, "black");  // Minute hand
    drawHand(seconds * 6, 130, 1, "black");    // Second hand

    // Draw clock numbers
    for (let i = 1; i <= 12; i++) {
        const angle = (i - 3) * 30 * (Math.PI / 180);
        const x = centerX + Math.cos(angle) * 120;
        const y = centerY + Math.sin(angle) * 120;
        ctx.fillText(i, x, y);
    }
}

function drawHand(angle, length, width, color) {
    const radians = angle * (Math.PI / 180);
    const x = centerX + Math.cos(radians) * length;
    const y = centerY + Math.sin(radians) * length;

    ctx.beginPath();
    ctx.moveTo(centerX, centerY);
    ctx.lineTo(x, y);
    ctx.lineWidth = width;
    ctx.strokeStyle = color;
    ctx.stroke();
}

function animateClock() {
    drawClock();
    requestAnimationFrame(animateClock);
}

animateClock();
