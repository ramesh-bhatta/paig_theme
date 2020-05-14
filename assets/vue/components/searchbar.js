Vue.component('searchbar',{
    data:function(){
        return {
            property_types:[],
            strategy_types:[],
            state:"",
            property_type:"",
            strategy_type:"",
            min_price:"",
            max_price:"",
            keywords:"",
            status:""
        };
    },
    mounted:function(){
        const url="https://paig_api_backend.test/";
        axios.get(url+"api/getInitialData")
        .then((response)=>{
            console.log(response.data);
            this.property_types=response.data["property_types"]
            this.strategy_types=response.data["strategy_types"];
        })
        .catch((error)=>{
            console.log(error);
        });
    },
    methods:{
        setStatus(value){
            console.log(value);
            console.log(this);
        },
        fetchAPI(){
            
        }
    }
});