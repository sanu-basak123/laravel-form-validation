"use strict";

var url = '';

 
var fetchRequest=function(url){

  var constructed_url=url;

  var headers=new Headers();

  headers.append("X-Requested-With", "XMLHttpRequest");
  
  headers.append("X-XSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').content);

  var params={
      headers:headers,
      credentials: 'same-origin',
      cache: 'no-cache'
  };

  var searchParams=new URLSearchParams();
 
  return {
      post:function(){
          params.method='POST';
          return fetch(constructed_url,params);
      },
      setBody:function(body){
          params.body=body;
      },
      setSearchParams:function(key,value){
          searchParams.set(key,value);
      },
      setHeaders:function(key,value){
          headers.append(key,value);
      },
  };
}

var formSubmitJS = {
   

    form :{} ,

    setForm : function(f){
       return this.form = f;
    },

    submit : function(event,constraints){

        event.preventDefault();
        

        if(event.target instanceof HTMLFormElement)
          this.setForm(event.target)
           
        if(typeof (constraints) === 'object')
          this.handleFormSubmit(constraints);
        else
          this.submit(); 
    },
 
    onSuccess : function(){

      that.request();
          
    },

    onError : function(errors){
        var formInput =  that.form.querySelectorAll("input[name], select[name]");
        if (errors instanceof Error) {
            console.err("An error ocurred", errors);
        } else {
            formInput.forEach(function(input) {
              that.showErrorsForInput(input, errors && errors[input.name]);
            });
        }
    },

    showErrorsForInput : function(input, errors){

          var formGroup = this.closestParent(input.parentNode, "form-group"),
          messages = formGroup.querySelector(".messages");

          this.resetFormGroup(formGroup);

          if (errors) {
      
              formGroup.classList.add("has-error");
          
              errors.forEach(function (error) {
                  that.addError(messages, error);
              });

          } else {

              formGroup.classList.add("has-success");

          }
    },

    resetFormGroup : function(formGroup){

          formGroup.classList.remove("has-error");
          formGroup.classList.remove("has-success");
          var helpBlockError =formGroup.querySelectorAll(".help-block.error");
          helpBlockError.forEach(function (el) {
              el.parentNode.removeChild(el);
          });
    },

    closestParent : function(child,className){

          if (!child || child == document) {
            return null;
          }
          if (child.classList.contains(className)) {
              return child;
          } else {
              return this.closestParent(child.parentNode, className);
          }
    },

    addError : function(messages,error){
          var block = document.createElement("span");
          block.classList.add("help-block");
          block.classList.add("error");
          block.style.color = "red";
          block.innerHTML = error;
          messages.appendChild(block);
    },

    request : function(){

        var formSubmit = fetchRequest(url);
        var formData = new FormData(this.form);
        formSubmit.setBody(formData);
    
        formSubmit.post().then(function (response) {
          if (response.status === 200) {
              console.log('success');
             
          }else if(response.status === 422){
            response.json().then((errors) => {
              if(errors.errors){    
                
              }
            });
          }
        });
    },

    handleFormSubmit : function(constraints){
        var values = validate.collectFormValues(this.form);
        validate.async(values, constraints).then(this.onSuccess, this.onError);
    }

  
}

var that = formSubmitJS;


