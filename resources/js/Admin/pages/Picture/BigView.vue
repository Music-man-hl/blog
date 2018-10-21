<template>
    <!-- Modal -->
    <div class="modal fade" id="pictureModal" tabindex="-1" role="dialog" aria-labelledby="pictureModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width: 1200px">
            <div class="modal-content">
                <div class="card">
                    <div class="card-header">
                        <button type="button" aria-hidden="true" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="tim-icons icon-simple-remove"></i>
                        </button>
                        <h4 class="modal-title" id="pictureModalLabel">{{ pictureTitle }}</h4>
                    </div>
                    <img v-bind:src="pictureSrc" alt="大图">
                </div>
                <!--<div class="modal-footer">-->
                <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">关闭</button>-->
                <!--<button type="button" class="btn btn-primary">保存图片</button>-->
                <!--</div>-->
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "BigView",
        props: {
            pictureSrc: {
                type: String,
                required: false
            },
            pictureTitle: {
                type: String,
                required: false
            },
        }
    }
</script>

<style scoped>

</style>