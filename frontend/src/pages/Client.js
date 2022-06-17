import React, { useState, useContext } from 'react'
import { motion, AnimatePresence } from "framer-motion"
import Loader from '../components/Loader';
import ClientSlider from '../components/ClientSlider';
import ClientSliderMobile from '../components/ClientSliderMobile';
import { BrowserView, MobileView } from 'react-device-detect';

import { StateContext } from "../context/State";

function Client() {

    const { settings } = useContext(StateContext);
    const { pages } = useContext(StateContext);
    const [loading, setLoading] = useState(true);

    // styles
    let style_body = { color: settings.body_color, fontFamily: settings.body_font, fontWeight: settings.body_weight, fontSize: settings.body_size, textAlign: settings.headings_desktop_align }
    let style_bg = { backgroundColor: settings.background_color }
    let style_wrapper = { padding: settings.padding_body_size, backgroundColor: settings.padding_body_color }
    
    if( settings.background_image_url !== null ) {
        style_bg = { backgroundColor: settings.background_color, backgroundImage: `url(${process.env.REACT_APP_UPLOADS_URL}/${settings.background_image_url})` }
    }


    const {mediaQuery} = useContext(StateContext) ;
    const mq = window.matchMedia(mediaQuery);
    if (mq.matches) {
        style_body = { fontFamily: settings.body_font_family_mobile, color: settings.body_color_mobile, fontSize: settings.body_size_mobile, fontWeight: settings.body_weight_mobile, textAlign: settings.body_desktop_align_mobile }
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
                    <div className="wrapper" style={ style_wrapper }>
                        <main className="page-main" style={style_bg}>
                            <h6
                                style={style_body}
                                dangerouslySetInnerHTML={{__html: pages[3]?.content }}
                                >
                                    {/* some brands i've made cool stuff with */}
                                </h6>
                            <BrowserView>
                                <ClientSlider />
                            </BrowserView>
                            <MobileView>
                                <ClientSliderMobile />
                            </MobileView>
                        </main>
                    </div> 

        </AnimatePresence>                
    )
}

export default Client
