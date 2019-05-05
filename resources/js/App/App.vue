<template>
    <div id="app">
        <router-view name="header"/>
        <div class="wrapper">
            <div class="container">
                <router-view/>
            </div>
        </div>
        <router-view name="footer"/>
    </div>
</template>
<script>
    export default {};
</script>
