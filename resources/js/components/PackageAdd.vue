<template>
    <div class="w-full text-center">
        <form class="w-full max-w-lg" action="" style="margin: 0 auto" @submit.prevent="submit">
            <div class="flex flex-wrap -mx-3 mb-3">
                <div class="w-full px-3">
                    <!--<label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="package-url">
                        Package URL
                    </label>-->
                    <input @keyup="validateForm()" v-model.trim="packageUrlInput" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" :class="{'border-red-500' : !packageUrlValidated }" id="package-url" type="text" placeholder="https://github.com/jamesmills/laravel-timezone" autocomplete="off">
                    <p class="text-gray-600 text-xs italic"></p>
                </div>
            </div>
            <div class="flex flex-wrap -mx-3">
                <div class="w-full px-3">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded" style="width: 300px">
                        {{ submitBtnText }}
                    </button>
                </div>
            </div>
        </form>

        <section class="flex flex-wrap justify-center  lg:-mx-2 mt-12">
            <a v-for="(packagedata, index) in recentPackages.slice(0, paginationRecordsLimit)" :href="packagedata.package_url"  class="flex flex-col w-full lg:w-1/4 mt-2 lg:mt-0  overflow-hidden lg:my-2 lg:px-2 shadow-lg cursor-pointer px-2 scale--" target="_blank">
                <div class="rounded overflow-hidden shadow-lg bg-white h-full">
                    <div class="px-6 py-8">
                        <div class="font-bold text-l mb-2 whitespace-no-wrap">{{ packagedata.owner + ' / ' + packagedata.package_name  }}</div>
                        <p class="text-gray-700 text-base h-auto lg:h-24 xl:h-20 overflow-hidden">{{ packagedata.description }}</p>
                        <div class="flex items-center mt-4">
                            <img class="w-10 h-10 rounded-full mr-4" :src="packagedata.owner_avatar_url" :alt="packagedata.owner">
                            <div class="text-sm text-left">
                                <p class="text-black leading-none">{{ packagedata.owner }}</p>
                                <p class="text-grey-dark">{{ moment(packagedata.created_at) + ' ago' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </section>

    </div>
</template>

<script>
    import * as moment from 'moment'

    export default {
        name: 'packageAdd',
        data: function() {
            return {
                packageUrlInput: '',
                packageUrlValidated: true,
                submitBtnText: 'Submit',
                recentPackages: [],
                paginationPageNumber: 0,
                paginationRecordsLimit: 4,
            }
        },
        mounted() {
            this.fetchPackages();
        },
        methods: {
            fetchPackages() {
                axios.get('/api/package/' + this.paginationPageNumber).then(res => {
                    (res.data.packages).forEach( (data)=> {
                        this.recentPackages.push(data);
                    });
                }).catch(err => {
                    console.log('package api not responding ! '+ err)
                });
            },
            async submit() {
                if(this.packageUrlInput != '' && this.validURL(this.packageUrlInput) && this.submitBtnText == 'Submit') {

                    this.submitBtnText = 'Investigating Repo...';

                    await axios.post('/api/package', {
                        package_url: this.packageUrlInput
                    }).then(res => {

                        this.recentPackages.unshift(res.data);
                        this.packageUrlInput = '';

                        setTimeout( ()=> {
                            window.swal.fire({
                                title:"Thank you",
                                text: "Package is registered.",
                                type: "success",
                                heightAuto: false
                            });
                        }, 1000)

                    }).catch(err => {

                        window.swal.fire({
                            title: "Error !",
                            text: err.response.data.errors.package_url[0],
                            type: "error",
                            heightAuto: false
                        });

                    }).finally( ()=> {
                        this.submitBtnText = 'Submit';
                    });
                }
                else {
                    this.packageUrlValidated = this.packageUrlInput == '' ? false : true;
                }
            },
            validateForm() {
                this.packageUrlValidated = this.packageUrlInput == '' ? false : true;
            },
            validURL(str) {
                var regex = /(http|https):\/\/(\w+:{0,1}\w*)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%!\-\/]))?/;
                if(!regex .test(str)) {

                    window.swal.fire({
                        title: "Error !",
                        text: "Please enter valid URL !",
                        type: "error",
                        heightAuto: false
                    });

                    return false;
                } else {
                    return true;
                }
            },
            moment(date) {
                return moment(date).utc().toNow(true)
            }
        }
    }
</script>
<style lang="scss" scoped>

    /*.scale-- {*/
    /*    transition: 0.3s all ease-in-out;*/
    /*    transform: scale(1);*/

    /*    &:hover {*/
    /*        transform: scale(1.2);*/
    /*        z-index: 10;*/
    /*    }*/
    /*}*/

</style>
