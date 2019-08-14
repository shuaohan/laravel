<template>
    <div class="container">
        <form action="" method="post">
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">文章类别</label>
                <div class="col-sm-10">
                    <select class="custom-select  " id="numddd" name="class" @change="change" v-model="article.class">
                        <option selected value="0">Choose...</option>
                        <option value="1">无聊图</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">标题</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="title" name="title" v-model="form_picture.forms.title">
                </div>
            </div>
            <div class="form-group row" v-show="article.data.content==1">
                <label for="content" class="col-sm-2 col-form-label">内容</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="content" rows="3" name="content" v-model="form_picture.forms.content"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">热门</label>
                <div class="col-sm-4">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input mx-2" type="radio" name="ishot" id="inlineRadio1" value="1" v-model="form_picture.forms.ishot">
                        <label class="form-check-label" for="inlineRadio1">是</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input mx-2" type="radio" name="ishot" id="inlineRadio2" value="0" v-model="form_picture.forms.ishot" >
                        <label class="form-check-label" for="inlineRadio2">否</label>
                    </div>
                </div>
                <label for="title" class="col-sm-2 col-form-label">推荐</label>
                <div class="col-sm-4">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input mx-2" type="radio" name="iscommend" id="comRadio1" value="1" v-model="form_picture.forms.iscommend">
                        <label class="form-check-label" for="comRadio1">是</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input mx-2" type="radio" name="iscommend" id="comRadio2" value="0" v-model="form_picture.forms.iscommend" >
                        <label class="form-check-label" for="comRadio2">否</label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label for="like" class="col-sm-2 col-form-label">喜欢</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="like" name="like" v-model="form_picture.forms.like">
                </div>
            </div>
            <div class="form-group row" v-show="article.data.class==1">
                <label for="title" class="col-sm-2 col-form-label">类别</label>
                <div class="col-sm-10">
                    <select class="custom-select  " id="inlineFormCustomSelectPref" name="class" v-model="form_picture.forms.class">
                        <option selected value="">Choose...</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">预览图</label>
                <div class="col-sm-9">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="b" ref="pre">
                        <label class="custom-file-label" for="b">Choose file</label>
                        <input type="hidden"  name="preview"  v-model="form_picture.forms.preview">
                    </div>
                </div>
                <div class="col-sm-1">
                    <button class="btn btn-outline-primary" type="button" @click.prevent="upartpre">上传</button>
                </div>
                <div id="picture-preview" ></div>
            </div>
            <!--            -->
            <div>
                <div class="p-1 border border-info rounded" v-show="article.data.pics==1" v-for="(value,key) in form_picture.pictures" v-bind:key="key">
                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">图片标题</label>
                        <div class="col-sm-10">
                            <input type="text" name="title"  class="form-control" placeholder="title"
                                   v-model="value.title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label  class="col-sm-2 col-form-label">图片路径</label>
                        <div class="col-sm-5">
                            <input type="text" name="path" class="form-control" placeholder="path"
                                   v-model="value.path">

                        </div>
                        <div class="col-sm-4">
                            <div class="custom-file">
                                <input type="file" class="form-control-file" ref="pic">
                            </div>
                        </div>
                        <div class="com-sm-1"><button class="btn btn-outline-primary" type="button" @click.prevent="upartpic(key)">上传</button></div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" @click.prevent="del(key)">删除图片</button>
                    </div>
                </div>
                <div>
                    <button class="btn btn-primary m-2" v-show="article.data.pics==1" @click.prevent="add">添加图片</button>
                    <button type="button" class="btn btn-primary m-2" @click.prevent="upformfile">提交</button>
                    <div>{{form_picture}}</div>
                </div>
            </div>
                <!---->
<!--            <div class="form-group row">-->
<!--                <label  class="col-sm-2 col-form-label">图片</label>-->
<!--                <div class="col-sm-9">-->
<!--                    <div class="custom-file">-->
<!--                        <input type="file" class="custom-file-input" id="a">-->
<!--                        <label class="custom-file-label" for="a">Choose file</label>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-sm-1">-->
<!--                    <button class="btn btn-outline-primary" type="button">上传</button>-->
<!--                </div>-->
<!--            </div>-->

        </form>
    </div>

</template>

<script>
    export default {
        data:function () {
            return {
                form_picture:{
                    pictures: [{
                        title: '',
                        path: ''
                    }],
                    forms:{
                        ishot:'0',
                        iscommend:'0',
                        like:'0',
                        title:'',
                        class:'',
                        preview:'',
                        content:'',

                    }
                },
                article:{
                    class:'0',
                     data:{
                         ishot:'1',
                         iscommend:'1',
                         like:'1',
                         title:'1',
                         class:'1',
                         preview:'1',
                         content:'1',
                         pics:'1'
                     }
                }

            }
        },
        methods:{
            add() {
                this.form_picture.pictures.push({
                    title: '',
                    path: ''
                });
            },
            del(key) {
                this.form_picture.pictures.splice(key, 1);
            },
            change(){
                var tmp=this.article.class;
                switch(tmp)
                {
                    case '1':
                        this.article.data.content='0';
                        this.article.data.class='0';
                        this.article.data.pics='0';
                        break;
                    default :
                        this.article.data.content='1';
                        this.article.data.class='1';
                        this.article.data.pics='1';
                        this.article.data.ishot='1';
                        this.article.data.iscommend='1';
                        this.article.data.like='1';
                        this.article.data.preview='1';
                        this.article.data.pics='1';
                        break;

                }
            },
            upartpre()
            {
                var _this=this;
                let formData = new FormData();
                formData.append('preview', this.$refs.pre.files[0]);
                axios.post(
                    '/admin/upartpre',
                    formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        },
                        params:{
                            class:this.article.class,
                        }
                    }
                ).then(function (response) {
                    _this.form_picture.forms.preview=response.data.path;
                    // $('#picture-path').val(response.data.path);
                    $('#picture-preview').html('<img src="' + response.data.path + '">');
                }).catch(function (error) {
                    console.log(error);

                });
            },
            upartpic(key)
            {
               // console.log(this.$refs.pic[key].files[0]);
                var _this=this;
                let formData = new FormData();
                formData.append('picture', this.$refs.pic[key].files[0]);
                axios.post(
                    '/admin/upartpic',
                    formData, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }

                    }
                ).then(function (response) {
                    _this.form_picture.pictures[key].path=response.data.path;
                }).catch(function (error) {
                    console.log(error);

                });
            },
            upformfile()
            {

                axios.post(
                    '/admin/article',
                    this.form_picture,
                    {
                        params: {
                            class:this.article.class
                        }
                    }

                ).then(function (response) {
                    console.log(response)

                }).catch(function (error) {
                    console.log(error);
                })
            }
        }
    }
</script>

<style scoped>

</style>
