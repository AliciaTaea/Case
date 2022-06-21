<template >
    <v-timeline-item large>
      <template v-slot:icon>
        <v-avatar>
          <img :src="launch.links.patch.small">
        </v-avatar>
      </template>
      <template v-slot:opposite>
        <span>{{launchDate}}</span>
      </template>
      <v-card class="elevation-2">
        <v-card-title class="headline">
          ชื่อ: {{ launch.name}}
        </v-card-title>
        <!-- <v-card-subtitle>ROCKET: {{launch.rocket}}</v-card-subtitle> -->
        <v-card-text>เวลาที่ปล่อย:{{ launch.date_utc}}</v-card-text>
        <v-card-text>จำนวนนักบิน:{{ launch.crew}}</v-card-text>
      </v-card>
     
<v-dialog
      v-model="dialog"
      width="500"
    >
      <template v-slot:activator="{ on, attrs }">
        <v-btn
          color="green lighten-2"
          dark
          v-bind="attrs"
          v-on="on"
        >
         รายละเอียดเพิ่มเติม
        </v-btn>
      </template>

      <v-card>
        <v-card-title class="text-h5 grey lighten-2">
           รายละเอียดเพิ่มเติม
        </v-card-title>

        <v-card-text>
          รายละเอียด:{{ launch.details}} <br>
          ข้อมูลจรวด:{{ launch.rocket}} <br>
          นักบิน:{{ launch.crew}} <br>
          ฐานที่ยิง:{{ launch.launchpad}}
        </v-card-text>
       

        <v-divider></v-divider>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="primary"
            text
            @click="dialog = false"
          >
            OK
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>

    </v-timeline-item>
    
    
</template>

<script>
import moment from 'moment'
export default {
  data () {
      return {
        dialog: false,
      }
    },
 props:["launch"],
 computed: {
     launchDate(){
         return moment(this.launch.date_utc).format("DD/MM/YYYY");
     }
 },
 
};

</script>