import React, {useState, useEffect, useContext } from 'react'
import serviceData from '../data/serviceData'

import useCursorHandlers from "../hooks/useCursorHandlers";

import { StateContext } from "../context/State";

function ServiceSliderMobile() {

    const { services } = useContext(StateContext);

    const { settings } = useContext(StateContext);
    const style_headings = { fontFamily: settings.headings_font_family_mobile, color: settings.headings_color_mobile, fontSize: settings.headings_size_mobile, fontWeight: settings.headings_weight_mobile, textAlign: settings.headings_desktop_align_mobile }

    // eslint-disable-next-line
    const [serviceList, setserviceList] = useState(serviceData)
    const [index, setIndex] = useState(0)

    const cursorHandlers = useCursorHandlers();

    useEffect(() => {
        const lastIndex = services.length - 1
        
        if (index < 0){
            setIndex(lastIndex)
        }
        if (index > lastIndex){
            setIndex(0)
        }

    },[index, services])

    useEffect(() => {
        
        let slider = setInterval( () => {
            setIndex(index+1)
        }, 500)   
        
        return () => clearInterval(slider)
        
    }, [index]);
    

    return (
        <section className="section">
            <div className="section-center">
            {           
                services.map( (s, sId) => {
                    let position = 'nextSlide'
                    
                    if (sId === index){
                        position = 'activeSlide'
                    }
        
                    if (sId === index - 1 || (index === 0 && sId === services.length - 1) ){
                        position = 'lastSlide'
                    }
                    
                    return (
                        <article className={position} key={s.id}>
                            <h2 className="slide-header"
                                style={ style_headings }
                                {...cursorHandlers}>{s.title}</h2>
                        </article>  
                    )   
                }) 
                
            }
            
            </div>
        </section>
        
    )
}

export default ServiceSliderMobile
