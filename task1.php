<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<!-- this Like main() in c ++ lanagauge the excuted start form here  -->

<!-- start Main() -->
<div id="app"> 
  <tasks></tasks>
</div>
<!-- end Main() -->

<!-- star todo template containing ervery thing tht can use for to do -->
<template id="myTask">
    <div>
        <div class="container">
            <div class="row justify-content-center">
                <div class=" col-md-8 col-md-offset-2">
                    <div class="my-panel">
                        <div class="panel-heading">
                            <div class="row">
                                <input type="text" placeholder="المهـــــــه" class="form-control col-xs-2 input-cus"
                                    v-model="task.task" @keydown.enter="createTask">
                                <button class="btn btn-success col-xs-2 btn-cus" @click.prevent="createTask">اضافه</button>
                            </div>
                        </div>
                        <div class="panel-body" style="color:black">
                            <div class="alert alert-danger" v-if="!tasks.length"> ماعند مهام يا اصلي لو داير اضيف!</div>
                            <div class="tasks-list">
                                <ul class="list-unstyled">
                                    <li v-for="task in tasks" :key="task.id" :class="{done: task.complate}">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" v-model="task.complate" @click="done(task)" title="اختار لانهاء المهمه">
                                                {{ task.task }}
                                                <div class="pull-left">
                                                    <a href="" @click.prevent="remove(task)" title="حـذف">
                                                        <span class="glyphicon glyphicon-trash"></span>
                                                    </a>
                                                </div>
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-footer" v-if="tasks.length">
                            <span class="label label-default"> عندك {{tasks.length}} مهمه</span>
                            <span class="label label-warning"> المهام الغير مكتمله {{reminingTask()}} </span>
                            <span class="label label-success"> المهام المكتمله {{complateTask()}} </span>
                            <div class="pull-left">
                                <a href="" @click.prevent="" title=""><span class=" glcus glyphicon glyphicon-trash"></span></a>
                            </div>
                        </div>
                    </div>
                    <strong style="color:blanchedalmond; font-family:'Courier New', Courier, monospace ">All copyright
                        &copy; Mohamed Amin ToDo &target;</strong>
                </div>
            </div>
        </div>
        <br>
        <div class="col-md-4 col-md-offset-4" v-for="photo in photos" :key="photo.id">
            <img :src="photo.url" style="height:100px; width: 100px; margin:50px">
        </div>
    </div>
    </template>
    <script src="vuejs/vue.js"></script>
    <script src="vuejs/axios.js"></script>
    <script src="vuejs/vueapp.js"></script>
</body>
</html>
