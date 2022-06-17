import React, { useState, useContext } from 'react'
import { motion, AnimatePresence } from "framer-motion"
import Loader from '../components/Loader';
import { StateContext } from "../context/State";


function Home() {

    const { settings } = useContext(StateContext);    
    const { pages } = useContext(StateContext);
    const [loading, setLoading] = useState(true); 

    // styles
    let style_headings = { fontFamily: settings.headings_font_family, color: settings.headings_color, fontSize: settings.headings_size, fontWeight: settings.headings_weight, textAlign: settings.headings_desktop_align }
    let style_bg = { backgroundColor: settings.background_color }
    let style_wrapper = { padding: settings.padding_body_size, backgroundColor: settings.padding_body_color }
    
    if( settings.background_image_url !== "no-image.jpg" ) {
        style_bg = { backgroundColor: settings.background_color, backgroundImage: `url(${process.env.REACT_APP_UPLOADS_URL}/${settings.background_image_url})` }
    }


    const {mediaQuery} = useContext(StateContext);
    const mq = window.matchMedia(mediaQuery);
    if (mq.matches) {
        style_headings = { fontFamily: settings.headings_font_family_mobile, color: settings.headings_color_mobile, fontSize: settings.headings_size_mobile, fontWeight: settings.headings_weight_mobile, textAlign: settings.headings_desktop_align_mobile }
    }


    return (
        <AnimatePresence>
                
            { loading &&
                (
                    <motion.div key="pre-loader">
                        <Loader setLoading={setLoading} />
                    </motion.div> 
                )
            }

            <div className="wrapper" style={style_wrapper}>

                <main className="page-main" style={style_bg}>
                    <h2 style={style_headings}
                        dangerouslySetInnerHTML={{__html: pages[0]?.content }}
                        >
                    </h2>
                </main>

            </div> 

        </AnimatePresence>                
    )
}

export default Home
