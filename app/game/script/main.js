import { Player } from './player.js';
import { Rocket } from './rocket.js';
import { Background } from './background_layer.js';

function rungame() {
    document.querySelector('#game_launcher').style.display = "none";
    document.querySelector('#gameover_info').style.display = "none";

    // canvas setup
    const canvas = document.querySelector('canvas');
    const ctx = canvas.getContext('2d');
    canvas.width = 600;
    canvas.height = 400;

    class Game {
        constructor(width, height) {
            this.width = width;
            this.height = height;
            this.background = new Background(this);
            this.player = new Player(this);
            this.rocketTimer = 0;
            this.rocketInterval = 1000;
            this.rockets = [];
            this.collisionNumber = 0;
            this.gameOver = false;
            this.scoreCount = 0;
            this.score = 0;
            this.speed = 3;
        }
        update(deltaTime) {
            this.player.updatePlayerInfo();
            this.background.update();
            this.background.layer5.update();
            this.player.update();
            this.scoreCount++;
            this.score = Math.round(this.scoreCount * 0.025);
            // augmente l'interval de génération des rockets
            this.rocketInterval = (this.rocketInterval - 0.1);
            // console.log(this.rocketInterval);
            this.rockets.forEach(rocket => {
                rocket.update();
                if (this.checkCollision(this.player, rocket)) {
                    rocket.markedForDeletion = true;
                    this.collisionNumber++;
                    this.player.lives--;
                }
                if (this.player.lives <= 0) {
                    this.gameOver = true;
                    handleGamerOver();
                }
            });
            this.rockets = this.rockets.filter(rocket => !rocket.markedForDeletion);
            if (this.rocketTimer > this.rocketInterval && !this.gameOver) {
                this.addRocket();
                this.rocketTimer = 0;
            } else {
                this.rocketTimer += deltaTime;
            }
        }
        draw(context) {
            this.background.draw(context);
            this.player.draw(context);
            this.rockets.forEach(rocket => {
                rocket.draw(context);
            })
            this.background.layer5.draw(context);
        }
        addRocket() {
            this.rockets.push(new Rocket(this));
        }
        checkCollision(rect1, rect2) {
            return (rect1.x < rect2.x + rect2.width &&
                rect1.x + rect1.width > rect2.x &&
                rect1.y < rect2.y + rect2.height &&
                rect1.height + rect1.y > rect2.y)
        }
    }

    const game = new Game(canvas.width, canvas.height);
    let lastTime = 0;
    function animate(timeStamp) {
        const deltaTime = timeStamp - lastTime;
        lastTime = timeStamp;
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        game.update(deltaTime);
        game.draw(ctx);
        if (!game.gameOver) requestAnimationFrame(animate);
    }
    animate(0);
}

function handleGamerOver() {
    document.querySelector("#hearts").innerHTML = '';
    document.querySelector('#gameover_info').style.display = "flex";
}

const launchBtn = document.querySelector("#launchGameBtn");
launchBtn.addEventListener("click", rungame);

const newgameBtn = document.querySelector("#newgameBtn");
newgameBtn.addEventListener("click", rungame);