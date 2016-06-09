// Funkcja Ajax() tworzy obiekt XMLHttpRequest
// uwzgl�dnia to, �e obiekt tworzy si� r�nie w zale�no�ci od przegl�darki
function Ajax(){
  var request;
  try  {
  	request=new XMLHttpRequest(); // Firefox, inne, IE od 7
  }
  catch (e)  {
    var XmlHttpVersions = new Array("MSXML2.XMLHTTP.6.0","MSXML2.XMLHTTP.5.0","MSXML2.XMLHTTP.4.0",
    								"MSXML2.XMLHTTP.3.0","MSXML2.XMLHTTP","Microsoft.XMLHTTP");
    for ( var i=0; i<XmlHttpVersions.length && !request; i++ ){
      try{
        request=new ActiveXObject(XmlHttpVersions[i]); // IE wczesniejsze wersje
      }
      catch (e) {}
    }
  }
  if (!request){
    alert("Your browser does not support AJAX!");
    return null; 
  }
  else return request;
}

