function CreateRequest() {
  var request = null;
  try
  {
    //создаем объект запроса для Firefox, Opera, Safari
    request = new XMLHttpRequest();
  }
  catch (e)
  {
    //создаем объект запроса для Internet Explorer
    try
    {       request=new ActiveXObject("Msxml2.XMLHTTP");
    }
    catch (e)
    {
      request=new ActiveXObject("Microsoft.XMLHTTP");
    }
  }
  return request;
};

function getContent(term)
{
  /*создаем новый объект запроса*/
  newRequest = CreateRequest();
  /*если не удалось создать объект запроса, то заканчиваем выполнение функции*/
  if (newRequest==null)
  {
    return;
  }
  /*формируем url-адрес*/
  var url = "content/" + term + ".php";  
  /*настраиваем объект запроса для установки связи*/
  newRequest.onreadystatechange = LoadResults;
  newRequest.open("GET", url, true);

  /*отправляем запрос серверу*/
  newRequest.send();
}

function LoadResults()
{
  /*Проверяем состояние готовности*/
  if (newRequest.readyState == 4){
    /*Проверяем статус запроса*/
    if (newRequest.status == 200){
    /*все в порядке, обрабатываем ответ*/
    let msgText = newRequest.responseText;
    let msgBlock = document.getElementById('content');
    msgBlock.innerHTML = msgText;
    };
  };
};
