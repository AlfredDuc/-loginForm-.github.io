
// Ngôn ngữ bậc cao dùng tiện tht 

// Trong jvscript cần sử dụng document để lấy phần tử từ html và getElementById là để lấy ID cụ thể (truyền tham số)
const signUpButton = document.getElementById('signUpButton');
const signInButton=document.getElementById('signInButton');
const signInForm=document.getElementById('signIn');
const signUpForm=document.getElementById('signUp');


// Lắng nghe sự kiện từ người dùng nếu mà người dùng ấn vào sign up thì sign in sẽ ẩn đi và chỉ có sign up được hiện ra 
signUpButton.addEventListener('click',function(){
    signInForm.style.display="none";
    signUpForm.style.display="block";
})

// Lắng nghe sự kiện từ người dùng nếu mà người dùng ấn vào sign in thì sign up sẽ ẩn đi và chỉ có sign in được hiện ra 
signInButton.addEventListener('click', function(){
    signInForm.style.display="block";
    signUpForm.style.display="none";
})