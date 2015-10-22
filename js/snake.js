function Snake(x, y, size, direction) {
    this.startX = x;
    this.startY = y;
    this.startDirection = direction;
    this.startSize = size;
    this.size = size;
    this.grow = false;
    this.points = [];
    this.sprite = null;
    this.keys = {
        37: 'left',
        38: 'up',
        39: 'right',
        40: 'down'
    };
    this.mordu = 0;
    this.score;

    this.initPoints = function() {
        this.x = this.startX;
        this.y = this.startY;
        this.direction = this.startDirection;
        this.points = [];
        for (var i = 0; i < this.size; i++) {
            this.points.push(this.x*10 + 10*i);
            this.points.push(this.y*10 + 10);
        };
    }

    this.initSprite = function() {
        this.sprite = new Kinetic.Line({
            points: this.points,
            stroke: 'black',
            strokeWidth: 6,
            lineCap: 'round',
            lineJoin: 'round'
        });
    }

    this.initBretzel = function() {
        this.bretzel = new Kinetic.Circle({
            x: 0,
            y: 0,
            fill: 'blue',
            width: 6,
            height: 6
        });
    }

    this.initScore = function() {
        this.score = new Kinetic.Text({
            x: 5,
            y: 3,
            text: '0',
            fontSize: 20,
            fontFamily: 'Calibri',
            fill: 'black'
        });
    }

    this.init = function() {
        this.initPoints();
        this.initSprite();
        this.initBretzel();
        this.placeBretzel();
        this.initScore();
        this.mordu = 0;
        this.size = this.startSize;
    }

    this.placeBretzel = function() {
        this.bretzel.setX(Math.ceil(Math.random()*68)*10);
        this.bretzel.setY(Math.ceil(Math.random()*30)*10);
    }

    this.move = function() {
        aux = [];
        if (this.points[this.points.length-2] == this.bretzel.getX() && this.points[this.points.length - 1] == this.bretzel.getY()) {
            this.size++;
            this.score.setText(this.size - this.startSize);
            this.grow = true;
            this.placeBretzel();
        }

        if (this.grow == false) {
            for (var i = 2; i < this.points.length; i++) {
                aux.push(this.points[i]);
            };
        } else {
            aux = this.points;
            this.grow = false;
        }

        this.points = aux;
        var newX, newY;
        switch (this.direction) {
            case 'right':
                newX = this.points[this.points.length - 2] + 10;
                newY = this.points[this.points.length - 1];
                break;
            case 'left':
                newX = this.points[this.points.length - 2] - 10;
                newY = this.points[this.points.length - 1];
                break;
            case 'up':
                newX = this.points[this.points.length - 2];
                newY = this.points[this.points.length - 1] - 10;
                break;
            case 'down':
                newX = this.points[this.points.length - 2];
                newY = this.points[this.points.length - 1] + 10;
                break;
        }

        if (newX > 680 || newX < 0 || newY > 300 || newY < 0) {
            return false;
        } else {
            for (var i = 0; i < this.points.length - 1; i++) {
                if (this.points[i] == newX && this.points[i+1] == newY) {
                    this.mordu++;
                }
            };

            this.points.push(newX);
            this.points.push(newY);

            /*if (newX == this.bretzel.getX() && newY == this.bretzel.getY()) {
                this.size++;
                //this.grow = true;
                this.placeBretzel();
            }*/
        }

        this.sprite.setPoints(this.points);

        if (this.mordu === 2) {
            return false;
        }

        if (this.mordu === 1) {
            this.mordu = 2;
        }

        return true;
    }

    this.setDirection = function(keyCode) {
        if (
            (keyCode == 37 && this.direction != 'right') ||
            (keyCode == 38 && this.direction != 'down') ||
            (keyCode == 39 && this.direction != 'left') ||
            (keyCode == 40 && this.direction != 'up')
            ) {
            this.direction = this.keys[keyCode];
        }
    }

    this.init();
}

$('#game-container').html('<div id="game"></div>');

var stage = new Kinetic.Stage({
    container: 'game-container',
    width: 680,
    height: 300
});

var layer = new Kinetic.Layer();

layer.add(new Kinetic.Rect({
    x: 0,
    y: 0,
    width: stage.getWidth(),
    height: stage.getHeight(),
    fill: '#a9cb98',
}));

var grille = new Kinetic.Group({
    x: 0,
    y: 0
});

for (var i = 0; i < stage.getWidth() / 10; i++) {
    grille.add(new Kinetic.Line({
        points: [i * 10, 0, i * 10, 300],
        stroke: 'red',
        strokeWidth: 1,
        lineCap: 'round',
        lineJoin: 'round'
    }));

    grille.add(new Kinetic.Line({
        points: [0, i * 10, 685, i * 10],
        stroke: 'red',
        strokeWidth: 1,
        lineCap: 'round',
        lineJoin: 'round'
    }));
};

var point = new Kinetic.Circle({
    x: 100,
    y: 100,
    fill: 'red',
    width: 8,
    height: 8
});

var snake = new Snake(35,15,10,'right');

layer.add(snake.sprite);
layer.add(snake.bretzel);
layer.add(snake.score);

stage.add(layer);

var loop = function() {
    if (snake.move()) {
        layer.draw();
    }
}

setInterval(loop, 100);

$(document).keydown(function(e) {
    if (e.which == 13) {
        snake.mordu = 0;
        snake.size = snake.startSize;
        snake.initPoints();
        snake.score.setText(snake.size - snake.startSize);
    } else {
        snake.setDirection(e.which);
    }
});
