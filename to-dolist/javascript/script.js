function addto(){
    var name=document.getElementById("input");
       var todotex=name.value.trim();
       if(todotex!==""){
        var li=document.createElement("li");
        li.textContent=todotex;
        var delbut=document.createElement("button")/* to cteate elements in the form */
        delbut.textContent="Delete";
        delbut.classList.add("delete-but");/* to cretae class in js */
        delbut.onclick=function(){
            li.remove();
        }
        li.appendChild(delbut);
        document.getElementById("todolist").appendChild(li);
        name.value="";
       }
}