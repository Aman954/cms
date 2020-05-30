$(document).ready(function(){
 
 $('#selectedall').click(function(event){
   
   if(this.checked)
   {
    $('.checkmate').each(function(){
    
     this.checked=true;    
    
        
    }); 
   }
   
   else
   {
    $('.checkmate').each(function(){
    
     this.checked=false;    
    
      
    }); 
   }
   
   
     
 });
  
});