//Greys out page until loaded
function load()
{
    document.getElementById("load").style.filter = "grayscale(0%)";
};

//Makes login card appear
function openForm()
{
    document.getElementsByTagName("html")[0].style.overflow = "hidden";
    document.getElementById("loginpage").style.display = "block";
}

//makes login card disappear
function closeForm()
{
    document.getElementsByTagName("html")[0].style.overflow = "auto";
    document.getElementById("loginpage").style.display = "none";
}

//adds event listeners to see if the login open and close buttons are clicked.
document.getElementById("loginopen").addEventListener("click", function(){openForm()});
document.getElementById("loginclose").addEventListener("click", function(){closeForm()});