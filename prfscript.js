function load()
{
    document.getElementById("load").style.filter = "grayscale(0%)";
};
//document.getElementsByTagName("html")[0].style.overflow = "hidden";

function openDelForm()
{
    document.getElementsByTagName("html")[0].style.overflow = "hidden";
    document.getElementById("prfdelpage").style.display = "block";
}

function closeDelForm()
{
    document.getElementsByTagName("html")[0].style.overflow = "auto";
    document.getElementById("prfdelpage").style.display = "none";
}

document.getElementById("prfdelclose").addEventListener("click", function(){closeDelForm()});