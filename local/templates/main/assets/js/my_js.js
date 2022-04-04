window.onload = function () {

    let reg = /^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/,
        reg2 = /[0-9]/;

    let inp = document.querySelector('#user_phone');
    let err = document.getElementsByClassName('text-danger');
    let success = document.getElementsByClassName('text-success');


    document.querySelector('.btn').onclick = function myFunction(e) {
        e.preventDefault();
        if (!reg.test(inp.value)) {
            return err;
        } else {
            return success;
        }
    };
    // function validate(regex, inp){
    // return regex.test(inp);
    // }
    // function notValid(inp, el){
    //     inp.classList.add('.is_invalid');
    //     el=document.getElementsByClassName('text-danger');
    // }
    // function valid(inp, el){
    //     inp.classList.remove('.is_invalid');
    //     inp.classList.add('.is_valid');
    //     el=document.getElementsByClassName('text-success');
    // }
}
