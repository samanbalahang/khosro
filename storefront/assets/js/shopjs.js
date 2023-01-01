$(function(){
    $(".woocommerce-ordering .orderby").addClass("form-control")  
    if($("body #wpadminbar").length){
       $("html").addClass("adminislogin");
    }
    $("#mode").on("click",function(){
        $("body").toggleClass("light");
        $("body").toggleClass("dark");
        $(".mode-checkbox").toggleClass("dark-mood");
        $("#sun").toggleClass("d-none");
        $("#moon").toggleClass("d-none");
        
    });
    $("#bars").on("click",function(){
        $(".nav-mobile-div").toggleClass("active");
        $("#RightMenu ul").clone().appendTo(".nav-mobile-div");
        $("#LeftMenu ul").clone().appendTo(".nav-mobile-div");
        $("#mainMenu ul").clone().appendTo(".nav-mobile-div");
        $("#bgblack").toggleClass("active");
    
    });
    $("#bgblack").on("click",function(){
        $(".nav-mobile-div").toggleClass("active");
        $("#bgblack").toggleClass("active");
        $(".nav-mobile-div").empty();
    });
    
    $("#nav-user-acount").on("click",function(){
        $("#nav-user-acount").toggleClass("active");
        $("#basket").removeClass("active");
    });
    
    $("#basket").on("click",function(){
        $("#basket").toggleClass("active");
        $("#nav-user-acount").removeClass("active");
    });
});    