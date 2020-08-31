//Greys out page until loaded
function load()
{
    document.getElementById("load").style.filter = "grayscale(0%)";
};

//Opens the user account deletion form
function openDelForm()
{
    document.getElementsByTagName("html")[0].style.overflow = "hidden";
    document.getElementById("prfdelpage").style.display = "block";
}

//Closes the user account deletion form
function closeDelForm()
{
    document.getElementsByTagName("html")[0].style.overflow = "auto";
    document.getElementById("prfdelpage").style.display = "none";
}

//adds event listener for closing the form
document.getElementById("prfdelclose").addEventListener("click", function(){closeDelForm()});