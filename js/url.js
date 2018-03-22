//Script para cambiar el texto de la url
var stateObj = { foo: "bar" };
function change_my_url()
{
   history.pushState(stateObj, "page 2", "reservas.php");
}