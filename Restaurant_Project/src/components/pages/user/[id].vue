<script setup lang="js">
import { useRoute } from 'vue-router/auto';
const router = useRouter()
const route =useRoute('./components/page/user/[id]');


console.log(route.params.id)
</script>