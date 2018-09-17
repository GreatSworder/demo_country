function change_columns_color() {
    setTimeout(function ()
    {
        var button=document.getElementById("button_add_country");
        if(button.classList.contains("btn-primary"))
        {
            button.classList.remove("btn-primary");
            button.classList.add("btn-danger");
        }
        else if(button.classList.contains("btn-danger"))
        {
            button.classList.remove("btn-danger");
            button.classList.add("btn-success");
        }
        else
        {
            button.classList.remove("btn-success");
            button.classList.add("btn-primary");
        }
    },500);
}