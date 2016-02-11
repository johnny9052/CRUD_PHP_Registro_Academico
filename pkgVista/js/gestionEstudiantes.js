function validar(f1,tipo){
    
    f1.type.value=tipo;
    
    if(tipo=="save" || tipo=="update"){
        if(f1.codigo.value!="" && f1.nombre.value!="" && f1.apellido.value!="" && f1.cedula.value!="" && f1.edad.value!="" && f1.semestre.value!=""){
            f1.submit();
        } else{
            alert("Ingrese todos los datos");
        }
    }
    
    
    if(tipo=="search" || tipo=="delete"){
        if(f1.codigo.value!=""){
            f1.submit();
        } else{
            alert("Ingrese el dato de busqueda");
        }
    }
        
    if(tipo=="list"){        
        f1.submit();
    }
}
    

