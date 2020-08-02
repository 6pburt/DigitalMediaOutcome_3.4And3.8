function load()
{
    document.getElementById("load").style.filter = "grayscale(0%)";
};
//document.getElementsByTagName("html")[0].style.overflow = "hidden";

function openForm()
{
    document.getElementsByTagName("html")[0].style.overflow = "hidden";
    document.getElementById("loginpage").style.display = "block";
    //document.getElementsByTagName("html")[0].scrollTop(100)
}

function closeForm()
{
    document.getElementsByTagName("html")[0].style.overflow = "auto";
    document.getElementById("loginpage").style.display = "none";
}

document.getElementById("loginopen").addEventListener("click", function(){openForm()});
document.getElementById("loginclose").addEventListener("click", function(){closeForm()});