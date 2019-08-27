Vue.component('tasks',{
   
    template: '#myTask',

    data(){
        return{
            tasks:[],
            task:{
              task: ''
            },
            photos:[]
        }
    },
    mounted(){
        this.fetchData();
        this.getPhoto();
    },
    // all function can maybe make it in vue js Mohamed Amin
    methods:{
        reminingTask(){
         return this.tasks.filter(task =>{return !task.complate}).length
        },
        complateTask(){
         return this.tasks.filter(task =>{ return task.complate}).length
        },
        fetchData(){
            axios.get('http://localhost:8000/tasks')
             .then((res)=>{
                 this.tasks = res.data.data;
             })
             .catch((err)=>{
                 console.log(err);
             });
        },
        createTask(){
            axios.post('http://localhost:8000/tasks',this.task).then((res)=>{
                //add without load or any problem.
                 this.fetchData()
                 this.task.task = ''
             })
             .catch((err)=>{
                 console.log(err)
             })
             
        },
        done(task){
            axios.put(`http://localhost:8000/tasks/${task.id}`, {
                complate: !task.complate
            })
            .catch((err)=>{
                console.log(err)
            })
        },
        remove(task)
        {
            axios.delete(`http://localhost:8000/tasks/${task.id}`)
             .then((res)=>{
                 const taskIndex = this.tasks.indexOf(task)
                 this.tasks.splice(taskIndex , 1)
             })
             .catch((err)=>{
                 console.log(err)
             })
        },
        
        // getPhoto(){
        //     axios.get('https://jsonplaceholder.typicode.com/photos')
        //          .then((res)=>{
        //              this.photos = res.data
        //          })
        //          .catch((err)=>{
        //              console.error(err)
        //          })
        // }
        // removeAll(){
        //     axios.delete('task/delete')
             
        // }
    }
});
// Vue.component('hello',{
//     template:"<h1 v-model='name'></h1>",

//     data(){
//      return{
//          name:'hello'
//      }
//     }
// });
new Vue({
    el: '#app'
  });