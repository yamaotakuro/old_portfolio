var canvas = document.getElementById('canvas');
var ctx = canvas.getContext('2d');
var cW = $(window).width();   //キャンバス横サイズ
var cH = $(window).height();   //キャンバス縦サイズ
var timerParticleID;    //生成タイマー
var timerDrawID;    //描画タイマーID
var particleArr = [];   //配列
var color = "#fff"; 
canvas.width = cW;
canvas.height = cH;

init();

function init(){
    
  if ( ! canvas || ! canvas.getContext ) return false;
  //タイマー開始
  setTimerParticle();
  setTimerDraw();
}

function setTimerParticle(){
  addParticle();
  setTimeout(setTimerParticle,1000);
}
function setTimerDraw(){
  draw();
  setTimeout(setTimerDraw,50);
}
function addParticle() {
  var obj = new Object();
  var z = Math.random();  //奥行き
  obj.fr = 0; //フレーム
  obj.x = Math.random() * cW; //初期X座標
  obj.y = (cH-200);    //初期Y座標
  obj.z = z;  //奥行き
  obj.alpha = 1 - z * 0.5;    //透明度
  obj.scale = 1 + z * 2;  //大きさ
  obj.speed = z * 2 + 1;  //スピード
  obj.divX = 1 + z;   //横ゆれの幅
  obj.angleX = Math.random() * 2 + 1; //横ゆれの角度差分
  particleArr.push(obj);
}
function draw() {

  ctx.clearRect(0,0,cW,cH);
  for (i = 0; i < particleArr.length; i++) {
    particleArr[i].fr += particleArr[i].angleX;
    particleArr[i].x += Math.cos(particleArr[i].fr * Math.PI / 180) * particleArr[i].divX;
    particleArr[i].y -= particleArr[i].speed;
    //キャンバス下部を超えたものは削除
    if (particleArr[i].y > (cH + particleArr[i].scale)) particleArr.splice(i, 1);
    ctx.beginPath();
    ctx.fillStyle = color;
    ctx.globalAlpha = particleArr[i].alpha;
    ctx.arc(particleArr[i].x, particleArr[i].y, particleArr[i].scale, 0, Math.PI * 2, false);
    ctx.fill();
  }
}
function random(max,min){
  return Math.floor( Math.random() * (max - min + 1) ) + min;
}