<template>
    <div>
        <el-form :model="formdata" label-position="left" label-width="5em" size="small" action="">
            <el-form-item label="预览图">
                <el-upload ref="upartpre" action="http://192.168.10.10/admin/upartpic" :auto-upload="false"
                    :on-success="presuccess" :before-upload="beforeuppre" :headers="{'X-CSRF-TOKEN':csrfToken}" :limit="1"
                    accept=".jpg" :data="{class:'sound'}" name="picture">
                    <el-button slot="trigger" size="small" type="primary">选取文件</el-button>
                    <el-button style="margin-left: 10px;" size="small" type="success" @click="upartpre">上传到服务器
                    </el-button>
                    <div slot="tip" class="el-upload__tip">只能上传jpg文件，且不超过500kb</div>
                </el-upload>
            </el-form-item>
            <el-form-item label="内容">
                <el-upload ref="uparttxt" action="http://192.168.10.10/admin/uparttxt" :auto-upload="false"
                    :on-success="txtsuccess" :before-upload="beforeuptxt" :headers="{'X-CSRF-TOKEN':csrfToken}" :limit="1"
                    accept=".txt" :data="{class:'sound'}" name="txt">
                    <el-button slot="trigger" size="small" type="primary">选取文件</el-button>
                    <el-button style="margin-left: 10px;" size="small" type="success" @click="uparttxt">上传到服务器
                    </el-button>
                    <div slot="tip" class="el-upload__tip">只能上传txt文件，且不超过500kb</div>
                </el-upload>
            </el-form-item>
            <el-form-item label="推荐" prop="resource">
                <el-radio-group v-model="formdata.iscommend">
                    <el-radio label="1" border>是</el-radio>
                    <el-radio label="0" border>否</el-radio>
                </el-radio-group>
            </el-form-item>
            <el-form-item label="热门" prop="resource">
                <el-radio-group v-model="formdata.ishot">
                    <el-radio label="1" border>是</el-radio>
                    <el-radio label="0" border>否</el-radio>
                </el-radio-group>
            </el-form-item>
            <el-form-item label="喜欢" prop="name">
                <el-input v-model="formdata.like"></el-input>
            </el-form-item>
            <el-form-item label="点击数" prop="name">
                <el-input v-model="formdata.click"></el-input>
            </el-form-item>
            <el-form-item label="">
                <el-button type="primary" @click="tijiao">提交</el-button>
            </el-form-item>
        </el-form>
        <p>{{formdata}}</p>
    </div>
</template>
<script>
    export default {

        data: function () {
            return {
                formdata: {
                    picture: '',
                    ishot: '0',
                    iscommend: '0',
                    content: '',
                    click: '0',
                    like: '0'
                },
                csrfToken: $('meta[name="csrf-token"]').attr('content'),
            }
        },
        methods: {
            upartpre() {
                this.$refs.upartpre.submit();
            },
            uparttxt()
            {
                this.$refs.uparttxt.submit();
            },
            presuccess(respone, file, filelist) {
                //console.log(respone);
                if (respone.status == 200) {
                    this.$message('上传成功');
                    this.formdata.picture = respone.path;
                } 
            },
            txtsuccess(respone, file, filelist) {
                
                if (respone.status == 200) {
                        this.$message('上传成功');
                        this.formdata.content = respone.path;
                } 
            },
            beforeuptxt(files) {
                const isOver = files.size / 1024 / 1024 > 1;
                if (isOver) {
                    this.$message('文件大小不能超过1M');
                    return false;
                } else {
                    return true;
                }
            },
            beforeuppre(files) {
                const isOver = files.size / 1024 / 1024 > 1;
                if (isOver) {
                    this.$message('文件大小不能超过1M');
                    return false;
                } else {
                    return true;
                }
            },
            tijiao()
            {
                var _this=this;
                //axios中的respone对象与element中el-upload中的respone对象不同，
                //前者通过laravle框架返回的数据需要在data中获取，  respone.data.****(respone.config和respone.headers等都在里面)
                //后者直接获取  respone.****   里面的config,headers，request对象属性不在里面
                axios.post(
                    '/admin/article/sound',
                    this.formdata,
                ).then(function(respone){
                   // console.log(respone);
                    _this.$message('提交成功');
                    window.location.reload();
                }).catch(function(error){
                    console.log(error);
                });
            }

        },

    }

</script>
<style scoped>

</style>
