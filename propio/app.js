function cifrado(a,b,msj){
  const abecedario = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
    
  let cifrado = "";
  var msjAreglo = [""], arrCifrado = [""];

  for(let i = 0; i < msj.length; i++)
  {
    for(let j = 0; j < abecedario.length; j++)
    {
      if(msj[i] == abecedario[j])
      {
        msjAreglo[i] = j;
      }
    }    
  }

  for (let i = 0; i < msjAreglo.length; i++)
  {
    let pos = (msjAreglo[i] + b * a) % 26;
    arrCifrado[i] = pos;
  }

  for(let i = 0; i < arrCifrado.length; i++)
  {
    cifrado += abecedario[arrCifrado[i]];   
  }
  return cifrado;
}


function cifrado(a,b,msj){
  const abecedario = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
    
  let cifrado = "";
  var msjAreglo = [""], arrCifrado = [""];

  for(let i = 0; i < msj.length; i++)
  {
    for(let j = 0; j < abecedario.length; j++)
    {
      if(msj[i] == abecedario[j])
      {
        msjAreglo[i] = j;
      }
    }    
  }

  for (let i = 0; i < msjAreglo.length; i++)
  {
    let pos = (msjAreglo[i] + b * a) % 26;
    arrCifrado[i] = pos;
  }

  for(let i = 0; i < arrCifrado.length; i++)
  {
    cifrado += abecedario[arrCifrado[i]];   
  }
  return cifrado;
}

function Descifrado(a,b,msj){
    const abecedario = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
    
    let descrifrado = "";

    var msjAreglo = [""];

    for(let i = 0; i < msj.length; i++)
    {
      for(let j = 0; j < abecedario.length; j++)
      {
        if(msj[i] == abecedario[j])
        {
          msjAreglo[i] = j;
        }
      }    
    }
    
    var arrDescifrado = [""];

    for (let i = 0; i < msjAreglo.length; i++)
    {
      let pos = ((msjAreglo[i] - b * a) + 26) % 26;
      arrDescifrado[i] = pos;
    }

    for(let i = 0; i < arrDescifrado.length; i++)
    {
        descrifrado += abecedario[arrDescifrado[i]];   
    }

    return descrifrado;
}











$(document).ready(function() {

  fetchUsuarios();

  $('#usuarios-form').submit(e => {
    e.preventDefault();

    a = document.getElementById('clave1').value;
    b = document.getElementById('clave2').value;
    dir = document.getElementById('direccion').value;
    ident = document.getElementById('indetificacion').value;
    pass = document.getElementById('psw').value;
    
    dirCifrado = cifrado(a, b, dir);
    idenCifrado = cifrado(a, b, ident);
    passCifrado = cifrado(a, b, pass);

    const postData = {
      nombre: $('#nombre').val(),
      apaterno: $('#apellidoP').val(),
      amaterno: $('#apellidoM').val(),
      direccion: dirCifrado,
      correo: $('#correo').val(),
      telefono: $('#telefono').val(),
      identificacion: idenCifrado,
      contrasena: passCifrado,
      clave1: $('#clave1').val(),
      clave2: $('#clave2').val()
    };
    const url =  'usuarios-add.php';
    console.log(postData, url);
    $.post(url, postData, (response) => {
      console.log(response);
      $('#usuarios-form').trigger('reset');
      fetchUsuarios();
    });
  });

  $('#id').keyup(function() {
    if($('#id').val()) {
      let id = $('#id').val();
      $.ajax({
        url: './usuarios-search.php',
        data: {id},
        type: 'POST',
        success: function (response) {
          if(!response.error) {
            let usuarios = JSON.parse(response);
            let template = '';
            usuarios.forEach(usuario => {

              a = usuario.clave1;
              b = usuario.clave2;
              dir = usuario.direccion;
              ident = usuario.identificacion;
              pass = usuario.contrasena;
              
              dirCifrado = Descifrado(a, b, dir);
              idenCifrado = Descifrado(a, b, ident);
              passCifrado = Descifrado(a, b, pass);

              template += `
                  <tr>
                  <td>${usuario.idusuario}</td>
                  <td>${usuario.nombre}</td>
                  <td>${usuario.apaterno}</td>
                  <td>${usuario.amaterno}</td>
                  <td>${dirCifrado}</td>
                  <td>${usuario.correo}</td>
                  <td>${usuario.telefono}</td>
                  <td>${idenCifrado}</td>
                  <td>${passCifrado}</td>
                  </tr>
                  `
            });
            $('#usuarios-search').html(template);
          }
        } 
      })
    }
  });

  function fetchUsuarios() {
    $.ajax({
      url: './usuarios-list.php',
      type: 'GET',
      success: function(response) {
        const usuarios = JSON.parse(response);
        let template = '';
        usuarios.forEach(usuario => {
          template += `
                  <tr>
                  <td>${usuario.idusuario}</td>
                  <td>${usuario.nombre}</td>
                  <td>${usuario.apaterno}</td>
                  <td>${usuario.amaterno}</td>
                  <td>${usuario.direccion}</td>
                  <td>${usuario.correo}</td>
                  <td>${usuario.telefono}</td>
                  <td>${usuario.identificacion}</td>
                  <td>${usuario.contrasena}</td>
                  </tr>
                `
        });
        $('#usuarios').html(template);
      }
    });
  }

});