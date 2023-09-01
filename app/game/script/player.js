export class Player {
    constructor(game) {
        this.game = game;
        this.width = 107;
        this.height = 37;
        this.x = 30;
        this.y = 160;
        this.speed = 6;
        this.lives = 3;
        this.image = document.getElementById('player');
        this.scoreDisplay = document.getElementById('score');
        this.heartsDisplay = document.getElementById('hearts');
        this.heartIcon = '<i class="bi bi-heart-fill"></i>';
    }
    update() {
        if (keys.up.pressed && lastKey === 'up') this.y = this.y - this.speed;
        else if (keys.down.pressed && lastKey === 'down') this.y = this.y + this.speed;

        if (this.y < 0) this.y = 0;
        if (this.y > this.game.height - this.height) this.y = this.game.height - this.height;
    }
    draw(context) {
        // context.strokeRect(this.x, this.y, this.width, this.height); // hitbox player
        context.drawImage(this.image, this.x, this.y);
    }
    updatePlayerInfo() {
        // score display
        this.scoreDisplay.textContent = 'Score : ' + this.game.score;
        // lives display
        var hearts = '';
        for (var i = 0; i < this.lives; i++) {
            hearts += this.heartIcon;
        }
        this.heartsDisplay.innerHTML = hearts;
    }
}

// key input handler
const keys = {
    up: { pressed: false },
    down: { pressed: false },
}

let lastKey = ''
document.addEventListener('keydown', (e) => {
    switch (e.key) {
        case 'ArrowUp':
            keys.up.pressed = true
            lastKey = 'up'
            break

        case 'ArrowDown':
            keys.down.pressed = true
            lastKey = 'down'
            break
    }
})
document.addEventListener('keyup', (e) => {
    switch (e.key) {
        case 'ArrowUp':
            keys.up.pressed = false
            break

        case 'ArrowDown':
            keys.down.pressed = false
            break
    }
})

const upButton = document.getElementById('btnUp');
const downButton = document.getElementById('btnDown');

upButton.addEventListener('mousedown', () => {
    keys.up.pressed = true;
    lastKey = 'up';
});

downButton.addEventListener('mousedown', () => {
    keys.down.pressed = true;
    lastKey = 'down';
});

upButton.addEventListener('mouseup', () => {
    keys.up.pressed = false;
});

downButton.addEventListener('mouseup', () => {
    keys.down.pressed = false;
});

// Event listeners for touch screen support
upButton.addEventListener('touchstart', () => {
    keys.up.pressed = true;
    lastKey = 'up';
});

downButton.addEventListener('touchstart', () => {
    keys.down.pressed = true;
    lastKey = 'down';
});

upButton.addEventListener('touchend', () => {
    keys.up.pressed = false;
});

downButton.addEventListener('touchend', () => {
    keys.down.pressed = false;
});