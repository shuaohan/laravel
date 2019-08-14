import Vue from 'vue'
import  './axios.js'
import test from './components/test.vue'
const vue=new Vue({
        el:'#app',
        render:c=>c(test)
})
