import { motion } from "framer-motion";



const Loader = ({ setLoading }) => {

  
// variants
const container = {
  show: {
    transition: {
      staggerChildren: 0.25,
      // delayChildren: 2
    },
  },
}

let randomId = Math.floor(Math.random() * 4)+1;
  
/* eslint no-eval: 0 */
function getRandomNumWithRange(min=1, max=4) {
  //let resp = Math.floor( Math.random() * (max - min) + min );
  let resp = ( Math.random() * (max - min) + min * randomId );
  return resp;
}





const bgBlack = {
  hidden: {
    backgroundColor: "#000000",
    height: '100vh',
    width: '100vw',
    opacity: 1,
    transition: {
      duration: 1,
    },
    x: 0,
    y: 0,
  },
  show: {
    backgroundColor: '#000000',
    opacity: 0,
    transition: {
      duration: 0.5,
    },
  },
  exit: {
    backgroundColor: '#000000',
    opacity: 0,
    scale: 1,
    transition: {
      ease: "easeInOut",
      duration: 0.5,
    },
  },
}


const image_delay_1 = 0; // show
const image_delay_2 = 1; // exit

const circle_delay_1 = 2;
const circle_delay_2 = 1; 

const image_dur_1 = 0;
const image_dur_2 = 3; // exit

const circle_dur_1 = 0;
const circle_dur_2 = 4; // exits

const vw = "vw";
const vh = "vh";


/* eslint no-unused-vars: 0 */
const image_ani_1 = {
  hidden: {
    opacity: 1,
    scale: 1,
    x: "-100vw",
    y: "-80vh",
    transition: {
      ease: "easeInOut",
      duration: image_dur_1,
      delay: image_delay_1,
    },
  },
  show: {
    opacity: 1,
    scale: 0,
    rotate: 0,
    x: getRandomNumWithRange(-70, 200)+vw,
    y: getRandomNumWithRange(0, 200)+vh,
    transition: {
      ease: "easeInOut",
      duration: image_dur_2,
      delay: image_delay_2,
    },
  }
}

const image_ani_2 = {
  hidden: {
    opacity: 1,
    scale: getRandomNumWithRange(1, 1),
    x: getRandomNumWithRange(500, 700),
    y: getRandomNumWithRange(-500, 0),
    transition:  { ease: 0, duration: image_dur_1, delay: 0 }
  },
  show: {
    opacity: 1,
    scale: 0,
    rotate: 0,
    x: -400, // Top Left
    y: getRandomNumWithRange(-100, 0),
    transition: {
      ease: "easeInOut",
      duration: image_dur_2,
      delay: image_delay_2,
    },
  },
}

const image_ani_3 = {
  hidden: {
    opacity: 1,
    scale: getRandomNumWithRange(1, 1),
    x: getRandomNumWithRange(-800, 400),
    y: getRandomNumWithRange(-100, 600),
    transition:  { ease: 0, duration: image_dur_1, delay: 0 }
  },
  show: {
    opacity: 1,
    scale: 0,
    rotate: 0,
    x: getRandomNumWithRange( -200, 800 ),
    y: -600, // Top
    transition: {
      ease: "easeInOut",
      duration: image_dur_2,
      delay: image_delay_2,
    },
  },
}

const image_ani_4 = {
  hidden: {
    opacity: 1,
    scale: 0.7,
    x: getRandomNumWithRange(-400, 0),
    y: getRandomNumWithRange(-1200, 0),
    transition:  { ease: 0, duration: image_dur_1, delay: 0 }
  },
  show: {
    opacity: 1,
    scale: 0,
    rotate: 0,
    x: 1100,
    y: 400,
    transition: {
      ease: "easeInOut",
      duration: image_dur_2,
      delay: image_delay_2,
    },
  },
}


 
const circle_ani_1 = {
  hidden: {
    opacity: 1,
    scale: 0.8,
    x: -100,
    y: -500,
    transition:  { ease: 0, duration: circle_dur_1, delay: circle_delay_1 }
  },
  show: {
    opacity: 1,
    scale: 0,
    rotate: 0,
    x: getRandomNumWithRange(-1, 0),
    y: getRandomNumWithRange(-280, 0),
    transition: {
      ease: "easeInOut",
      duration: circle_dur_2,
      delay: circle_delay_2,
    },
  },
}

const circle_ani_2 = {
  hidden: {
    opacity: 1,
    scale: getRandomNumWithRange(0.2, 1),
    // x: getRandomNumWithRange(-600, 1200),
    // y: getRandomNumWithRange(-500, 500),
    transition:  { ease: 0, duration: circle_dur_1, delay: circle_delay_1 }
  },
  show: {
    opacity: 1,
    scale: 0,
    rotate: 0,
    x: getRandomNumWithRange( 0, 100 ),
    y: getRandomNumWithRange( 0, 200 ),
    transition: {
      ease: "easeInOut",
      duration: circle_dur_2,
      delay: circle_delay_2,
    },
  },
}

const circle_ani_3 = {
  hidden: {
    opacity: 1,
    scale: getRandomNumWithRange(1, 1),
    x: getRandomNumWithRange(-200, 1200),
    y: getRandomNumWithRange(-500, 500),
    transition:  { ease: 0, duration: circle_dur_1, delay: circle_delay_1 }
  },
  show: {
    opacity: 1,
    scale: 0,
    rotate: 0,
    x: getRandomNumWithRange(400, 700),
    y: getRandomNumWithRange(0, 100),
    transition: {
      ease: "easeInOut",
      duration: image_dur_2,
      delay: image_delay_2,
    },
  },
}

const circle_ani_4 = {
  hidden: {
    opacity: 1,
    scale: getRandomNumWithRange(1, 1),
    x: getRandomNumWithRange(-200, 750),
    y: getRandomNumWithRange(-500, 1200),
    transition:  { ease: 0, duration: circle_dur_1, delay: circle_delay_1 }
  },
  show: {
    opacity: 1,
    scale: 0,
    rotate: 0,
    x: getRandomNumWithRange(-1100, 1100),
    y: getRandomNumWithRange(-1200, 400),
    transition: {
      ease: "easeInOut",
      duration: circle_dur_2,
      delay: circle_delay_2,
    },
  },
}




  return (
    <>
      <div className='pageloader-container hide-cursor'>

        <motion.div
          variants= {container}
          initial= "hidden"
          animate= "show"
          exit= "exit"
          onAnimationComplete= {() => {setLoading(false)}}
        >
          
          <motion.div className="bgBlack" 
            variants={bgBlack}
            style={ { backgroundColor:"#000000", width: "1200px", height: "1200px", zIndex: 100000, position: "relative" }}
            ></motion.div>
        
          <motion.img className="introImage image1"
            variants={ image_ani_1 }
            src={process.env.PUBLIC_URL + `/images/black-flower.svg`}
            style={ { width: "2400px", height: "2400px", top: "-80vh", left: "-25vw" }}
          />

          <motion.img className="introImage image2"
            variants={ image_ani_2 }
            src={process.env.PUBLIC_URL + `/images/black-flower.svg`}
            width="1200"
            height="1200"
          />
          
          <motion.img className="introImage image3"
            variants={ image_ani_3 }
            src={process.env.PUBLIC_URL + `/images/black-flower.svg`}
            width="1200"
            height="1200"
          />
          
          <motion.img className="introImage image4"
            variants={ image_ani_4 }
            src={process.env.PUBLIC_URL + `/images/black-flower.svg`}
            width="1200"
            height="1200"
          />

          <motion.img className="introImage image4"
            variants={ image_ani_3 }
            src={process.env.PUBLIC_URL + `/images/black-flower.svg`}
            style={ { width: "1200px", height: "1200px", top: "-280px", left: "600px" }}
          />


          <motion.img className="introImage image4"
            variants={ image_ani_4 }
            src={process.env.PUBLIC_URL + `/images/black-flower.svg`}
            style={ { width: "1200px", height: "1200px", top: "-200px", left: "-220px" }}
          />



 
          <motion.div
              className="introCircle circle1" 
              variants={ circle_ani_1 }
              style={ { width: "1800px", height: "1800px" }}
            ></motion.div>
           
          <motion.div
              className="introCircle circle2" 
              variants={ circle_ani_2 }
              style={ { width: "1200px", height: "1200px" }}
            ></motion.div>

          <motion.div
              className="introCircle circle3" 
              variants={ circle_ani_3 }
              style={ { width: "1200px", height: "1200px" }}
            ></motion.div>

          <motion.div
              className="introCircle circle4" 
              variants={ circle_ani_4 }
              style={ { width: "1200px", height: "1200px" }}
            ></motion.div> 

            
          <motion.div
              className="introCircle circle4" 
              variants={ circle_ani_2 }
              style={ { width: "1200px", height: "1200px", top: "-500px", left: "-500px" }}
            ></motion.div>

          <motion.div
              className="introCircle circle4" 
              variants={ circle_ani_3 }
              style={ { width: "1200px", height: "1200px", top: "-400px", left: "500px" }}
            ></motion.div>
            
            


          {/* <motion.div className="circle2" variants={ eval("circle_ani_" + getRandomNumWithRange(1, 4)) }></motion.div>

          <motion.div className="circle3" variants={ eval("circle_ani_" + getRandomNumWithRange(1, 4)) }></motion.div>
          
          <motion.div className="circle4" variants={ eval("circle_ani_" + getRandomNumWithRange(1, 4)) }></motion.div>

          <motion.div className="circle5" variants={ eval("circle_ani_" + getRandomNumWithRange(1, 4)) }></motion.div>

          <motion.div className="circle6" variants={ eval("circle_ani_" + getRandomNumWithRange(1, 4)) }></motion.div>  */}

    
          {/* <motion.img className="image-middle" variants={item}
            src={process.env.PUBLIC_URL + `/images/black-flower.svg`}
          />         
          */}

        </motion.div>
      </div>
    </>
  );
};

export default Loader;
