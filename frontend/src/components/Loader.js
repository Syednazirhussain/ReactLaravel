import { useContext } from 'react'
import { motion } from "framer-motion";
import useCursorHandlers from "../hooks/useCursorHandlers";

import { StateContext } from "../context/State";


const Loader = ({
    setLoading
}) => {

    const {
        settings
    } = useContext(StateContext);

    const cursorHandlers = useCursorHandlers();

    const onAnimationStart = () => {
        document.querySelector(".App").classList.add('animating');
        
        document.querySelector(".wrapper").style.height = `${window.innerHeight}px`;
        document.querySelector(".modal-overlay").style.height = `${window.innerHeight}px`
    }

    const onAnimationEnd = () => {
        setLoading(false)
        document.querySelector(".App").classList.remove('animating');
    }

    window.addEventListener('resize', e => {
        document.querySelector(".wrapper").style.height = `${e.target.innerHeight}px;`
        document.querySelector(".modal-overlay").style.height = `${e.target.innerHeight}px;`
    });

    // variants
    const container = {
        show: {
            transition: {
                staggerChildren: 0.25,
                // delayChildren: 2
            },
        },
    }

    let randomId = Math.floor(Math.random() * 4) + 1;

    /* eslint no-eval: 0 */
    function getRandomNumWithRange(min = 1, max = 4) {
        let resp = Math.floor(Math.random() * (max - min) + min);

        // let resp = ( Math.random() * (max - min) + min * randomId );
        // console.log("getRandomNumWithRange", resp )
        return resp;
    }


    const bgBlack = {
        hidden: {
            backgroundColor: "#000000",
            height: '100vh',
            width: '100vw',
            opacity: 1,
            transition: {
                duration: 0,
            },
            x: 0,
            y: 0,
        },
        show: {
            backgroundColor: '#000000',
            opacity: 0,
            transition: {
                duration: 1,
            },
        },
        exit: {
            backgroundColor: '#000000',
            opacity: 0,
            scale: 0,
            transition: {
                ease: "easeInOut",
                duration: 0,
            },
        },
    }


    const image_delay_1 = 0; // show
    const image_delay_2 = 0; // exit
    const image_dur_1 = 0;
    const image_dur_2 = 3; // exit


    const circle_delay_1 = 2;
    const circle_delay_2 = 0.01;
    const circle_dur_1 = 0;
    const circle_dur_2 = 2; // exits

    const vw = "vw";
    const vh = "vh";


    /* eslint no-unused-vars: 0 */
    const image_ani_1 = {
        hidden: {
            opacity: 1,
            rotate: 0,
            transition: {
                duration: image_dur_1,
                delay: image_delay_1,
            },
        },
        show: {
            opacity: 1,
            scale: 0,
            rotate: 180,
            x: getRandomNumWithRange(80, 90) + vw,
            y: getRandomNumWithRange(-100, -150) + vh,
            transition: {
                ease: "easeInOut",
                duration: image_dur_2,
                delay: image_delay_2,
            },
        },
        exit: {
            opacity: 0,
            scale: 0,
        }
    }

    const image_ani_2 = {
        hidden: {
            opacity: 1,
            rotate: 0,
            transition: {
                ease: 0,
                duration: image_dur_1,
                delay: 0
            }
        },
        show: {
            opacity: 1,
            scale: 0,
            rotate: 180,
            x: getRandomNumWithRange(40, 70) + vw,
            y: getRandomNumWithRange(70, 90) + vh,
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
            rotate: 0,
            transition: {
                ease: 0,
                duration: image_dur_1,
                delay: 0
            }
        },
        show: {
            opacity: 1,
            scale: 0,
            rotate: 180,
            x: getRandomNumWithRange(-100, 0) + vw,
            y: getRandomNumWithRange(70, 70) + vh,
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
            rotate: 0,
            transition: {
                ease: 0,
                duration: image_dur_1,
                delay: 0
            }
        },
        show: {
            opacity: 1,
            scale: 0,
            rotate: 180,
            x: getRandomNumWithRange(370, 440) + vw,
            y: getRandomNumWithRange(380, 420) + vh,
            transition: {
                ease: "easeInOut",
                duration: image_dur_2,
                delay: image_delay_2,
            },
        },
    }



    const image_ani_5 = {
        hidden: {
            opacity: 1,
            rotate: 0,
            transition: {
                ease: 0,
                duration: image_dur_1,
                delay: 0
            }
        },
        show: {
            opacity: 1,
            scale: 0,
            rotate: 180,
            x: getRandomNumWithRange(-20, -10) + vw,
            y: getRandomNumWithRange(-90, -100) + vh,
            transition: {
                ease: "easeInOut",
                duration: image_dur_2,
                delay: image_delay_2,
            },
        },
    }


    const image_ani_6 = {
        hidden: {
            opacity: 1,
            rotate: 0,
            transition: {
                ease: 0,
                duration: image_dur_1,
                delay: 0
            }
        },
        show: {
            opacity: 1,
            scale: 0,
            rotate: 180,
            x: getRandomNumWithRange(-50, 40) + vw,
            y: getRandomNumWithRange(120, 140) + vh,
            transition: {
                ease: "easeInOut",
                duration: image_dur_2,
                delay: image_delay_2,
            },
        },
    }

    const image_ani_7 = {
        hidden: {
            opacity: 1,
            rotate: 0,
            transition: {
                ease: 0,
                duration: image_dur_1,
                delay: 0
            }
        },
        show: {
            opacity: 1,
            scale: 0,
            rotate: 180,
            x: getRandomNumWithRange(-50, 40) + vw,
            y: getRandomNumWithRange(-60, -60) + vh,
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
            rotate: 0,
            transition: {
                ease: 0,
                duration: circle_dur_1,
                delay: circle_delay_1
            }
        },
        show: {
            opacity: 1,
            scale: 0,
            rotate: 180,
            x: getRandomNumWithRange(0, 90) + vw,
            y: getRandomNumWithRange(100, 100) + vh,
            transition: {
                ease: "easeInOut",
                duration: circle_dur_2,
                delay: circle_delay_2,
            },
        },
        exit: {
            opacity: 0,
            scale: 0,
        }
    }

    const circle_ani_2 = {
        hidden: {
            opacity: 1,
            rotate: 0,
            transition: {
                ease: 0,
                duration: circle_dur_1,
                delay: circle_delay_1
            }
        },
        show: {
            opacity: 1,
            scale: 0,
            rotate: 180,
            x: getRandomNumWithRange(-20, 80) + vw,
            y: getRandomNumWithRange(60, 70) + vh,
            transition: {
                ease: "easeInOut",
                duration: circle_dur_2,
                delay: circle_delay_2,
            },
        },
        exit: {
            opacity: 0,
            scale: 0,
        }
    }

    const circle_ani_3 = {
        hidden: {
            opacity: 1,
            rotate: 0,
            transition: {
                ease: 0,
                duration: circle_dur_1,
                delay: circle_delay_1
            }
        },
        show: {
            opacity: 1,
            scale: 0,
            rotate: 180,
            x: getRandomNumWithRange(0, 100) + vw,
            y: getRandomNumWithRange(60, 70) + vh,
            transition: {
                ease: "easeInOut",
                duration: image_dur_2,
                delay: image_delay_2,
            },
        },
        exit: {
            opacity: 0,
            scale: 0,
        }
    }

    const circle_ani_4 = {
        hidden: {
            opacity: 1,
            rotate: 0,
            transition: {
                ease: 0,
                duration: circle_dur_1,
                delay: circle_delay_1
            }
        },
        show: {
            opacity: 1,
            scale: 0,
            rotate: 180,
            x: getRandomNumWithRange(-100, 0) + vw,
            y: getRandomNumWithRange(-40, -20) + vh,
            transition: {
                ease: "easeInOut",
                duration: circle_dur_2,
                delay: circle_delay_2,
            },
        },
        exit: {
            opacity: 0,
            scale: 0,
        }
    }



    const circle_ani_5 = {
        hidden: {
            opacity: 1,
            rotate: 0,
            transition: {
                ease: 0,
                duration: circle_dur_1,
                delay: circle_delay_1
            }
        },
        show: {
            opacity: 1,
            scale: 0,
            rotate: 180,
            x: getRandomNumWithRange(-20, 0) + vw,
            y: getRandomNumWithRange(-140, -120) + vh,
            transition: {
                ease: "easeInOut",
                duration: circle_dur_2,
                delay: circle_delay_2,
            },
        },
        exit: {
            opacity: 0,
            scale: 0,
        }
    }


    const circle_ani_6 = {
        hidden: {
            opacity: 1,
            rotate: 0,
            transition: {
                ease: 0,
                duration: circle_dur_1,
                delay: circle_delay_1
            }
        },
        show: {
            opacity: 1,
            scale: 0,
            rotate: 180,
            x: getRandomNumWithRange(0, 70) + vw,
            y: getRandomNumWithRange(-120, -100) + vh,
            transition: {
                ease: "easeInOut",
                duration: circle_dur_2,
                delay: circle_delay_2,
            },
        },
        exit: {
            opacity: 0,
            scale: 0,
        }
    }




    const circle_ani_7 = {
        hidden: {
            opacity: 1,
            rotate: 0,
            transition: {
                ease: 0,
                duration: circle_dur_1,
                delay: circle_delay_1
            }
        },
        show: {
            opacity: 1,
            scale: 0,
            rotate: 180,
            x: getRandomNumWithRange(-140, -100) + vw,
            y: getRandomNumWithRange(-80, -80) + vh,
            transition: {
                ease: "easeInOut",
                duration: circle_dur_2,
                delay: circle_delay_2,
            },
        },
        exit: {
            opacity: 0,
            scale: 0,
        }
    }



    return ( <>
        <div className = 'pageloader-container hide-cursor' >


        <motion.div onAnimationStart = {
            () => {
                onAnimationStart()
            }
        }
        variants = {
            container
        }
        initial = "hidden"
        animate = "show"
        exit = "exit"
        onAnimationComplete = {
            () => {
                onAnimationEnd()
            }
        } >


        <motion.div className = "bgBlack" {
            ...cursorHandlers
        }
        variants = {
            bgBlack
        }
        style = {
            {
                backgroundColor: "#000000",
                width: "100vw",
                height: "100vh",
                zIndex: 100000,
                position: "relative"
            }
        } >
        </motion.div>

         <motion.img className = "introImage image1"
        variants = {
            image_ani_1
        }
        src = {
            `${process.env.REACT_APP_UPLOADS_URL}/${settings.intro_shape_url_1}`
        }
        style = {
            {
                width: "60vw",
                height: "60vw",
                top: "10vh",
                left: getRandomNumWithRange(-20, -40) + 'vw'
            }
        }
        />

        <motion.img className = "introImage image2"
        variants = {
            image_ani_2
        }
        src = {
            `${process.env.REACT_APP_UPLOADS_URL}/${settings.intro_shape_url_1}`
        }
        style = {
            {
                width: "50vw",
                height: "50vw",
                top: "-40vh",
                left: getRandomNumWithRange(25, 35) + 'vw'
            }
        }
        />

        <motion.img className = "introImage image3"
        variants = {
            image_ani_3
        }
        src = {
            `${process.env.REACT_APP_UPLOADS_URL}/${settings.intro_shape_url_1}`
        }
        style = {
            {
                width: "70vw",
                height: "70vw",
                top: "-50vh",
                left: getRandomNumWithRange(0, 80) + 'vw'
            }
        }
        />

        <motion.img className = "introImage image4"
        variants = {
            image_ani_4
        }
        src = {
            `${process.env.REACT_APP_UPLOADS_URL}/${settings.intro_shape_url_1}`
        }
        style = {
            {
                width: "100vw",
                height: "100vw",
                top: "-20vh",
                left: getRandomNumWithRange(-10, -30) + 'vw'
            }
        }
        />

        <motion.img className = "introImage image5"
        variants = {
            image_ani_5
        }
        src = {
            `${process.env.REACT_APP_UPLOADS_URL}/${settings.intro_shape_url_1}`
        }
        style = {
            {
                width: "80vw",
                height: "80vw",
                top: "-10vh",
                left: getRandomNumWithRange(-10, 40) + 'vw'
            }
        }
        />

        <motion.img className = "introImage image6"
        variants = {
            image_ani_6
        }
        src = {
            `${process.env.REACT_APP_UPLOADS_URL}/${settings.intro_shape_url_1}`
        }
        style = {
            {
                width: "50vw",
                height: "50vw",
                top: "-60vh",
                left: getRandomNumWithRange(0, 60) + 'vw'
            }
        }
        /> 

        <motion.img className = "introImage image7"
        variants = {
            image_ani_7
        }
        src = {
            `${process.env.REACT_APP_UPLOADS_URL}/${settings.intro_shape_url_1}`
        }
        style = {
            {
                width: "60vw",
                height: "60vw",
                top: "-10vh",
                left: getRandomNumWithRange(20, 40) + 'vw'
            }
        }
        />  


        <motion.img className = "introCircle circle1"
        variants = {
            circle_ani_1
        }
        src = {
            `${process.env.REACT_APP_UPLOADS_URL}/${settings.intro_shape_url_2}`
        }
        style = {
            {
                width: "140vh",
                height: "140vh",
                top: getRandomNumWithRange(-50, 0) + 'vh',
                left: getRandomNumWithRange(-40, 40) + 'vw'
            }
        }
        />


        <motion.img className = "introCircle circle2"
        variants = {
            circle_ani_2
        }
        src = {
            `${process.env.REACT_APP_UPLOADS_URL}/${settings.intro_shape_url_2}`
        }
        style = {
            {
                width: "70vh",
                height: "70vh",
                top: getRandomNumWithRange(0, 50) + 'vw',
                left: getRandomNumWithRange(-20, 80) + 'vw'
            }
        }
        />


        <motion.img className = "introCircle circle3"
        variants = {
            circle_ani_3
        }
        src = {
            `${process.env.REACT_APP_UPLOADS_URL}/${settings.intro_shape_url_2}`
        }
        style = {
            {
                width: "90vh",
                height: "90vh",
                top: "-20vh",
                left: getRandomNumWithRange(20, 30) + 'vw'
            }
        }
        />

        <motion.img className = "introCircle circle4"
        variants = {
            circle_ani_4
        }
        src = {
            `${process.env.REACT_APP_UPLOADS_URL}/${settings.intro_shape_url_2}`
        }
        style = {
            {
                width: "80vh",
                height: "80vh",
                top: "-40vh",
                left: getRandomNumWithRange(50, 60) + 'vw'
            }
        }
        />


        <motion.img className = "introCircle circle5"
        variants = {
            circle_ani_5
        }
        src = {
            `${process.env.REACT_APP_UPLOADS_URL}/${settings.intro_shape_url_2}`
        }
        style = {
            {
                width: "120vh",
                height: "120vh",
                top: "40vh",
                left: getRandomNumWithRange(-20, 20) + 'vw'
            }
        }
        />


        <motion.img className = "introCircle circle6"
        variants = {
            circle_ani_6
        }
        src = {
            `${process.env.REACT_APP_UPLOADS_URL}/${settings.intro_shape_url_2}`
        }
        style = {
            {
                width: "70vh",
                height: "70vh",
                top: "30vh",
                left: getRandomNumWithRange(25, 35) + 'vw'
            }
        }
        />


        <motion.img className = "introCircle circle7"
        variants = {
            circle_ani_7
        }
        src = {
            `${process.env.REACT_APP_UPLOADS_URL}/${settings.intro_shape_url_2}`
        }
        style = {
            {
                width: "70vh",
                height: "70vh",
                top: "30vh",
                left: getRandomNumWithRange(-55, -65) + 'vw'
            }
        }
        />  




        {
            /* <motion.div className="circle2" variants={ eval("circle_ani_" + getRandomNumWithRange(1, 4)) }></motion.div>

                      <motion.div className="circle3" variants={ eval("circle_ani_" + getRandomNumWithRange(1, 4)) }></motion.div>

                      <motion.div className="circle4" variants={ eval("circle_ani_" + getRandomNumWithRange(1, 4)) }></motion.div>

                      <motion.div className="circle5" variants={ eval("circle_ani_" + getRandomNumWithRange(1, 4)) }></motion.div>

                      <motion.div className="circle6" variants={ eval("circle_ani_" + getRandomNumWithRange(1, 4)) }></motion.div>  */
        }


        {
            /* <motion.img className="image-middle" variants={item}
                        src={process.env.PUBLIC_URL + `/images/black-flower.svg`}
                      />
                      */
        }

        </motion.div> </div>
       </>
    );
};

export default Loader;