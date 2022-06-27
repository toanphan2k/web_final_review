var x = "10";
function f(){
    var x = "4";
    console.log(this.x);
    function g() {console.log(x);}
    g();
}
f();

var arr = [1, 2, 3, 4];
console.log(arr.length);
arr[20] = 2;
console.log(arr.length)


function fn() {
    return 20;
}
if(true) {
    function fn() {
    return 10;
    }
}
console.log(fn());

var grade='A'; var result=0;
switch(grade){
    case 'A':
        result+=10;
    case 'B':
        result+=9;
    case 'C':
        result+=8;
    default:
        result+=0;
}
console.log(result);