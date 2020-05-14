Vue.component('properties-carousel',{ 
    props:['properties'],
    mounted:function(){
        console.log(this.properties);
    }
});