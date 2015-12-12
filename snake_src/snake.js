/**
 * jQuery based "Snake" game
 * 
 * Copyright (c) 2009 Dimitar Ivanov, info@bulgaria-web-developers.com
 * 
 * http://www.bulgaria-web-developers.com/projects/javascript/snake/
 * 
 * Dual licensed under the MIT and GPL licenses:
 *   http://www.opensource.org/licenses/mit-license.php
 *   http://www.gnu.org/licenses/gpl.html
 * 
 * @author Dimitar Ivanov <info@bulgaria-web-developers.com>
 * @version 1.0.0
 */
(function () {
	var document = window.document;
	window.snake = {
		//static members
		maxLevel: 12,
		maxWidth: 640,
		minWidth: 0,
		maxHeight: 480,
		minHeight: 0,
		step: 20,
		levelSetup: [
			{}, 
			{mice:  4, speed: 200, interval: 6000, color: 'red'}, 
			{mice: 12, speed: 190, interval: 5500, color: 'blue'}, 
			{mice: 15, speed: 180, interval: 5000, color: 'green'}, 
			{mice: 20, speed: 170, interval: 4500, color: 'brown'}, 
			{mice: 25, speed: 160, interval: 4000, color: 'magenta'}, 
			{mice: 30, speed: 150, interval: 3500, color: 'olive'}, 
			{mice: 40, speed: 140, interval: 3000, color: 'cyan'}, 
			{mice: 45, speed: 130, interval: 2500, color: 'orange'}, 
			{mice: 50, speed: 120, interval: 2000, color: 'yellow'}, 
			{mice: 55, speed: 110, interval: 1800, color: 'teal'}, 
			{mice: 60, speed: 100, interval: 1650, color: 'lime'}, 
			{mice: 65, speed:  90, interval: 1500, color: 'maroon'}
		],
		snakeID: 0,
		miceID: 0,
		intervalID: 0,
		timerID: 0,
		
		init: function () {
			this.started = false;
			this.paused  = false;
			this.direction = 'right';
			this.oldDirection = 'right';
			this.miceX = 0;
			this.miceY = 0;
			this.snakeX = 40;
			this.snakeY = 240;
			this.rings = [{left: 40, top: 240}];
			this.remain = 0;
			
			$("#snake").css("left", this.snakeX + "px");
			$("#snake").css("top", this.snakeY + "px");
			$("#mice").remove();
			$(".snakeBody").remove();
			$("a#pause").hide();
			$("a#play").show();
			
			window.clearInterval(this.snakeID);
			window.clearInterval(this.miceID);
			this.snakeID = 0;
			
			$("#speed").text(this.speed);
			$("#step").text(this.step);
			$("#level").text(this.level);
			$("#lives").text(this.lives);
			$("#interval").text(this.interval);
			$("#score").text(this.score);
			$("#size").text(this.size);
			$("#chance").text("");
			
			$("#intervalID").text("0");		
		},
		bindAll: function () {
			var self = this;
			$(document).unbind().bind("keydown", function (e) {
				var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;
				
				if (self.started && !self.paused) {	
					switch (key) {
					case 37: //Arrow Left
						//if (self.direction !== 'right') window.setTimeout(self.turn('left'), self.speed);
						if (self.direction !== 'right') { 
							self.turn('left');
						}
						break;
					case 38: //Arrow Up
						if (self.direction !== 'down') { 
							self.turn('up');
						}
						break;
					case 39: //Arrow Right
						if (self.direction !== 'left') {
							self.turn('right');
						}
						break;
					case 40: //Arrow Down
						if (self.direction !== 'up') {
							self.turn('down');
						}
						break;				
					}
					return false;
				}
				
				if (!self.started && !self.paused) {
					switch (key) {
					case 13: //Enter
					case 32: //SpaceBar
						$("a#play").toggle();
						$("a#pause").toggle();
						self.start();
						break;
					}
					return false;
				}
				
			}).bind("keypress", function (e) {
				var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;
				
				if (self.started && !self.paused) {	
					switch (key) {
					case 97: //Char 'A'
						//if (self.direction !== 'right') window.setTimeout(self.turn('left'), self.speed);
						if (self.direction !== 'right') { 
							self.turn('left'); 
						}
						break;
					case 119: //Char 'W'
						if (self.direction !== 'down') { 
							self.turn('up');
						}
						break;
					case 100: //Char 'D'
						if (self.direction !== 'left') {
							self.turn('right'); 
						}
						break;
					case 115: //Char 'S'
						if (self.direction !== 'up') {
							self.turn('down');
						}
						break;				
					}
				}
				
				switch (key) {
				case 103: //Char 'G'
					self.grid();
					break;
				case 112: //Char 'P'
					if (self.paused) {
						self.resume();
					} else {
						self.pause();
					}
					$("a#pause").toggle();
					$("a#play").toggle();
					break;
				case 110: //Char 'N'
					self.newGame();
					break;			
				}
			});
			
			$("a.nav").unbind().bind("click", function () {
				if (self.started && !self.paused) {
					if (self.direction !== $(this).attr('rev')) {
						self.turn($(this).attr('id'));
					}
					return false;
				}
			});
		},
		newGame: function () {
			this.score = 0;
			this.level = 1;
			this.lives = 3;
			this.speed = 200;
			this.interval = 6000;
			this.minutes = 0;
			this.seconds = 0;
			this.size = 0;
				
			this.init();
			if ($("#overlay").css("display") === 'none') {
				this.bindAll();
			}
			
			$("#highScore").text(this.getHighScore());
			$(".snakeBody").remove();
		},
		turn: function (to) {
			if (this.direction !== to) {
				this.oldDirection = this.direction;
				this.direction = to;			
				this.turnX = parseInt($("#snake").css("left").split("p")[0], 10);
				this.turnY = parseInt($("#snake").css("top").split("p")[0], 10);
				$("#direction").text(this.direction);
			}		
		},
		newLive: function () {
			this.init();
			$("#time").text(this.minutes.toString() + ':' + this.seconds.toString());
		},
		start: function () {
			this.started = true;
			this.paused = false;
			
			if (!this.snakeID) {
				this.move();
				this.moveScheduler();
				if (this.size > 0) {
					this.reborn();
					this.rebornScheduler(this.size);
				}
				this.mice();
				this.miceScheduler();
				this.timer();
			}
		},
		reborn: function () {							
			this.size = this.size - 1;
			this.grow();				
		},
		rebornScheduler: function (size) {
			if (size > 0) {
				var self = this;
				for (var i = 1; i < size; i++) {
					window.setTimeout(function () {	
						self.reborn();
					}, self.speed * i);
				}
			}
		},
		stop: function () {
			if (this.started) {
				this.overlay('show', 'Game Over');
			}
			this.setHighScore(this.score);
			this.newGame();
		},
		pause: function () {
			if (this.started) {
				this.paused = true;
			}
		},
		resume: function () {
			this.paused = false;
		},
		die: function () {
			this.lives = this.lives - 1;
			if (this.lives > 0) {
				this.overlay('show', '你死了=_=');
				this.newLive();
			} else {	
				this.stop();
			}		
		},
		move: function () {
			var rings = this.rings;
			this.rings = {};
			//Move Snake's head
			var next;
			switch (this.direction) {
			case 'left':
				next = parseInt($("#snake").css("left").split("p")[0], 10) - this.step;
				if (next >= this.minWidth) {
					$("#snake").css('left', next + "px");
					this.snakeX = next;
				} else {
					this.die();
				}
				break;
			case 'up':
				next = parseInt($("#snake").css("top").split("p")[0], 10) - this.step;
				if (next >= this.minHeight) {
					$("#snake").css('top', next + "px");
					this.snakeY = next;
				} else {
					this.die();
				}
				break;
			case 'right':
				next = parseInt($("#snake").css("left").split("p")[0], 10) + this.step;
				if (next < this.maxWidth) {
					$("#snake").css('left', next + "px");
					this.snakeX = next;
				} else {
					this.die();
				}
				break;
			case 'down':
				next = parseInt($("#snake").css("top").split("p")[0], 10) + this.step;
				if (next < this.maxHeight) {
					$("#snake").css('top', next + "px");
					this.snakeY = next;
				} else {
					this.die();
				}
				break;
			}
			this.rings[0] = {left: this.snakeX, top: this.snakeY};
					
			//Move first rings
			if ($("#snakeBody_1").length > 0) {
				var that = $("#snakeBody_1");
				var cLeft = parseInt(that.css("left").split("p")[0], 10);
				var cTop = parseInt(that.css("top").split("p")[0], 10);
				var nLeft, nTop;					
				switch (this.direction) {
				case 'left':						
					if (cTop !== this.turnY) {							
						switch (this.oldDirection) {
						case 'up':
							nTop = cTop - this.step;
							break;
						case 'down':
							nTop = cTop + this.step;
							break;
						}	
						nLeft = cLeft;
					} else {
						nLeft = cLeft - this.step;							
						nTop = cTop;							
					}
					break;
				case 'up':
					if (cLeft !== this.turnX) {							
						switch (this.oldDirection) {
						case 'left':
							nLeft = cLeft - this.step;
							break;
						case 'right':
							nLeft = cLeft + this.step;	
							break;
						}							
						nTop = cTop;
					} else {
						nTop = cTop - this.step;
						nLeft = cLeft;							
					}
					break;
				case 'right':						
					if (cTop !== this.turnY) {							
						switch (this.oldDirection) {
						case 'up':
							nTop = cTop - this.step;
							break;
						case 'down':
							nTop = cTop + this.step;
							break;
						default:
							nTop = cTop;
						}	
						nLeft = cLeft;
					} else {
						nLeft = cLeft + this.step;
						nTop = cTop;							
					}
					break;
				case 'down':
					if (cLeft !== this.turnX) {							
						switch (this.oldDirection) {
						case 'left':
							nLeft = cLeft - this.step;
							break;
						case 'right':
							nLeft = cLeft + this.step;	
							break;
						}							
						nTop = cTop;
					} else {
						nTop = cTop + this.step;
						nLeft = cLeft;							
					}
					break;
				}
				that.css({'left': nLeft.toString() + 'px', 'top': nTop.toString() + 'px'});
			}
			
			for (var i = 0; i < this.size; i++) {
				this.rings[i + 1] = {left: rings[i].left, top: rings[i].top};
				$("#snakeBody_" + (i + 1)).css({'left': this.rings[i + 1].left + 'px', 'top': this.rings[i + 1].top + 'px'});
			}
			
			//Fire if snake eat mice :)
			if (this.snakeX === this.miceX && this.snakeY === this.miceY) {
				this.eat();			
			}
			
			$("#snakeX").text(this.snakeX);
			$("#snakeY").text(this.snakeY);
		},
		moveScheduler: function () {
			var self = this;
			window.clearInterval(this.snakeID);
			this.snakeID = window.setInterval(function () {
				if (self.started && !self.paused) {
					self.move();
				}
			}, this.speed);
		},
		mice: function () {
			var x, y, self = this;
			do {
				x = Math.round(Math.random() * (this.maxWidth - this.step));
			} while (!!(x % this.step) && x !== this.snakeX);
	
			do {
				y = Math.round(Math.random() * (this.maxHeight - this.step));
			} while (!!(y % this.step) && y !== this.snakeY);
			
			this.miceX = x;
			this.miceY = y;
			
			$("#mice").remove();
			$("#box").append('<div id="mice" class="' + this.levelSetup[this.level].color + '"></div>');
			$("#mice").css({'top': this.miceY + 'px', 'left': this.miceX + 'px'});
			
			$("#miceX").text(this.miceX);
			$("#miceY").text(this.miceY);
			
			window.clearInterval(this.intervalID);
			var i = 0;
			this.intervalID = window.setInterval(function () {
				if (self.started && !self.paused) {
					$("#intervalID").text(i);
					i = i + 100;
				}
			}, 100);
			
			$("#chance").text(this.chance());
		},
		miceScheduler: function () {
			var self = this;
			window.clearInterval(this.miceID);
			this.miceID = window.setInterval(function () {
				if (self.started && !self.paused) {
					self.mice();
				}
			}, this.interval);
		},
		eat: function () {
			this.score = this.score + 1;
			$("#score").text(this.score);
			$("#mice").remove();
			
			//Fire if you reach current level score boundary
			if (this.levelSetup[this.level].mice === this.score) {
				this.level = this.level + 1;
				this.speed = this.levelSetup[this.level].speed;
				this.interval = this.levelSetup[this.level].interval;
				
				$("#level").text(this.level);
				$("#speed").text(this.speed);
				$("#interval").text(this.interval);
				
				//Fire if you reach max level
				if (this.level === this.maxLevel) {
					this.overlay('show', 'Congrats! You win the game');
					this.setHighScore(this.score);
					this.newGame();
					return;
				}
				
				//window.clearInterval(this.snakeID);
				this.move();
				this.moveScheduler();
			}
			
			this.mice();
			this.miceScheduler();
			this.grow();
		},
		grow: function () {
			var id = 'snakeBody_' + ($(".snakeBody").length > 0 ? $(".snakeBody").length + 1: 1);
			this.size = this.size + 1;
			$("#size").text(this.size);
			var lastX, lastY;
			if ($(".snakeBody:first").length > 0) {
				lastX = parseInt($(".snakeBody:first").css("left").split("p")[0], 10);
				lastY = parseInt($(".snakeBody:first").css("top").split("p")[0], 10);
			} else {
				lastX = this.snakeX;
				lastY = this.snakeY;
			}		
			
			var left, top;
			$("#snake").after('<div class="snakeBody" id="' + id + '"></div>');
			
			switch (this.direction) {
			case 'left':
				if (lastY !== this.snakeY) {
					switch (this.oldDirection) {
					case 'up':
						top = lastY + this.step;
						break;
					case 'down':
						top = lastY;
						break;
					}
					left = lastX;
				} else {
					left = lastX + this.step;
					top = lastY;	
				}
				break;
			case 'up':
				if (lastX !== this.snakeX) {
					switch (this.oldDirection) {
					case 'left':
						left = lastX + this.step;
						break;
					case 'right':
						left = lastX;
						break;
					}
					top = lastY;
				} else {
					left = lastX;
					top = lastY + this.step;	
				}
				break;
			case 'right':
				if (lastY !== this.snakeY) {
					switch (this.oldDirection) {
					case 'up':
						top = lastY + this.step;
						break;
					case 'down':
						top = lastY;
						break;
					default:
						top = lastY;
						break;
					}
					left = lastX;
				} else {
					left = lastX - this.step;
					top = lastY;	
				}
				break;
			case 'down':
				if (lastX !== this.turnX) {
					switch (this.oldDirection) {
					case 'left':
						left = lastX + this.step;
						break;
					case 'right':
						left = lastX;
						break;
					}
					top = lastY;
				} else {
					left = lastX;
					top = lastY - this.step;	
				}
				break;
			}
			$("#" + id).css({'left': left.toString() + 'px', 'top': top.toString() + 'px'});
			this.rings[this.size] = {'left': left, 'top': top};
		},
		timer: function () {
			var self = this;
			window.clearInterval(this.timerID);
			this.timerID = window.setInterval(function () {
				if (self.started && !self.paused) {
					self.seconds = self.seconds + 1;
					if (self.seconds === 60) {
						self.seconds = 0;
						self.minutes = self.minutes + 1;
					}
					var time = [self.minutes.toString(), self.seconds.toString()];
					$("#time").text(time.join(':'));
				}
			}, 1000);
		},
		chance: function () {
			var x = Math.abs(this.miceX - this.snakeX);
			var y = Math.abs(this.miceY - this.snakeY);
			var needTime = ((x + y) / this.step) * this.speed;
			if (needTime <= this.interval) {
				return '100% Sure!';
			} else {
				return 'No chance! Sorry';
			}
		},
		getHighScore: function () {
			var name = "snake=";
			var carray = document.cookie.split(";");
			var c;
			for (var i = 0; i < carray.length; i++) {
				c = carray[i];
				while (c.charAt(0) === ' ') {
					c = c.substring(1, c.length);
				}
				if (c.indexOf(name) === 0) {
					return c.substring(name.length, c.length);
				}
			}
			return null;
		},
		setHighScore: function (score) {
			var high = this.getHighScore();
			if (score > high) {
				document.cookie = "snake=" + score + "; expires=" + 60 * 60 * 24 * 30 + "; path=/";
			}
		},
		grid: function () {
			$("#box").toggleClass("grid");
		},
		overlay: function (a, note) {
			var self = this;
			switch (a) {
			case 'show':
				$(document).unbind().bind("keydown", function (e) {
					var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;
					// Escape
					if (key === 27) {
						self.overlay('hide');					
					}
				});
				$("a.nav").unbind();
				
				var w = $(document.body).innerWidth();
				var h = $(document.body).innerHeight();			
				var offset = $("#box").offset();
								$("#overlay").css({width: w.toString() + 'px', height: h.toString() + 'px'});
				$("#overlayBox").css({left: offset.left.toString() + 'px', top: offset.top.toString() + 'px'});
				
				$("#overlayNote").text(note);
				$("#overlayBox").fadeIn("normal", function () {
					$(this).show();
				});
				$("#overlay").fadeIn("normal", function () {
					$(this).show();
				});			
				break;
			case 'hide':
				$("#overlayBox").fadeOut("normal", function () {
					$(this).hide();
					$("#overlayNote").text('');
				});
				$("#overlay").fadeOut("normal", function () {
					$(this).hide();
				});
				this.bindAll();
				break;
			}
		}
	};
})(window);