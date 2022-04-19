var pic=["img/shiba.gif","img/shiba.jpg","img/shiba1.png","img/shiba2.jpg","img/shiba3.jpg"]
function change()
{
    var img=document.getElementById("cirImg");
    
    for(var i=0;i<pic.length;i++)
    {
        
        if(i==pic.length-1)
        {
            img.setAttribute("src",pic[0]);
            break;
        }
        if(pic[i]==img.getAttribute("src"))
        {
            img.setAttribute("src",pic[i+1]);
            break;
        }
    }
}
function initialize()
{
    addPersonalInfo();
    //addOtherInfo();
}

function addPersonalInfo()
{
    var personalInfo=new Map();
    personalInfo.set("Name","Ricky A/L Karunakaran");
    personalInfo.set("Age","18");
    personalInfo.set("Address","Pontian Johor");
    personalInfo.set("Email","ricky.k@graduate.utm.my");
    personalInfo.set("Address","Pontian Johor");
    personalInfo.set("Phone Number","I don't want to show here");
    
    var ul=document.createElement("ul");
    personalInfo.forEach((value,key,map)=>{
        var li=document.createElement("li");
        li.innerHTML=key+":"+value
        ul.appendChild(li);
    });
    
    var workingDiv=document.getElementById("personalInfo");
    workingDiv.style.borderBottomRightRadius="30px";
    workingDiv.style.padding="30px 20px 10px 30px";
    workingDiv.style.boxShadow="10px 20px 0px black";
    workingDiv.appendChild(ul);
    


}
