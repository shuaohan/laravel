<template>

    <div class="row">
        <div class="col-lg-2 col-sm-2 col-xl-2 p-2">Flex item 1</div>
        <div class="col p-2">
            <ul class="nav nav-tabs nav-stacked">
                <li class="nav-item">
                    <a href="/admin/lessons" class="nav-link">课程列表</a>
                </li>
                <li class="nav-item">
                    <a href="/admin/lessons/create" class="nav-link active">新增课程</a>
                </li>
            </ul>
            <form class="form border border-info rounded p-2 m-2" action="/admin/lessons" method="POST">
                <div class="d-flex flex-column">
                    <div>
                        <h3 class="text-info mt-2">课程管理</h3>
                    </div>
                    <div class="border border-info rounded p-3">
                        <div class="form-group">
                            <label for="title">标题</label>
                            <input type="text" name="title" id="title" class="form-control" required="required" v-model="form_video.forms.title"
                                placeholder="请输入标题">
                        </div>
                        <div class="form-group ">
                            <label for="introduce">介绍</label>
                            <textarea class="form-control" name="introduce" id="introduce" rows="3" v-model="form_video.forms.introduce"
                                required="required"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">预览图</label>
                            <input type="file" name="picture" class="form-control-file" id="preview" ref="picture" required="required">
                            <button type="button" class="btn btn-primary" @click="uploadfile()">上传预览图</button>
                            <input type="hidden"  id="picture-path" name="preview" value="" v-model="form_video.forms.preview">
                            <div id="picture-preview"></div>
                        </div>
                        <div class="form-group">
                            <label for="">热门</label>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label pl-2">
                                    <input class="form-check-input" type="radio" name="ishot" value="1" v-model="form_video.forms.ishot"> 是
                                    <input class="form-check-input" type="radio" name="ishot" value="0" checked="checked" v-model="form_video.forms.ishot"
                                        > 否
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">推荐</label>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label pl-2">
                                    <input class="form-check-input " type="radio" name="iscommend" value="1" v-model="form_video.forms.iscommend" > 是
                                    <input class="form-check-input " type="radio" name="iscommend" value="0"  checked="checked" v-model="form_video.forms.iscommend"
                                       > 否
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="click">点击数</label>
                            <input type="text" name="click" id="click" class="form-control" v-model="form_video.forms.click"
                                placeholder="请输入点击数" value="0">
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <div>
                        <h3 class="text-info mt-2">视频管理</h3>
                    </div>
                    <div>
                        <div class="m-2 p-2  border border-info rounded" v-for="(value,key) in form_video.videos" v-bind:key="key">
                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">视频标题</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control" placeholder="title"
                                        v-model="value.title">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label  class="col-sm-2 col-form-label">视频路径</label>
                                <div class="col-sm-10">
                                    <input type="text" name="path" class="form-control" placeholder="path"
                                        v-model="value.path">
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" @click.prevent="del(key)">删除视频</button>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary m-2" @click.prevent="add">添加视频</button>
                            <button type="button" class="btn btn-primary m-2" @click.prevent="upformfile">提交</button>
                            <button type="submit" class="btn btn-primary m-2">保存数据</button>
                             <div>{{form_video}}</div>
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {

                form_video:{
                    videos: [{
                    title: '',
                    path: ''
                }],
                    forms:{
                    ishot:'0',
                    iscommend:'0',
                    click:'0',
                    title:'',
                    preview:'',
                    introduce:''
                    }
                },

            }
        },
        methods: {

            add() {
                this.form_video.videos.push({
                    title: '',
                    path: ''
                });
            },
            del(key) {
                this.form_video.videos.splice(key, 1);
            },
            uploadfile() {

                var _this=this;
                let formData = new FormData();
                formData.append('picture', this.$refs.picture.files[0]);
                axios.post(
                    '/admin/test',
                    formData,
                ).then(function (response) {
                    _this.form_video.forms.preview=response.data.path;
                    $('#picture-path').val(response.data.path);
                    $('#picture-preview').html('<img src="' + response.data.path + '">');
                }).catch(function (error) {
                    console.log(error);

                });

            },
             upformfile() {
                axios.post(
                    '/admin/test',
                    this.form_video,{
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        params: {
                            class:'1'
                        },
                    }
                ).then(function (response) {
                    if(response.data.state==200){
                        location.href=response.data.url;
                    }

                }).catch(function (error) {
                    if(error.response.status==200)
                    {
                        // window.location.reload();
                        //location.href=error.response.url;
                    }
                    {
                        console.log(error);
                    }
                });

            },
        },
    }

</script>
<style scoped>

</style>
