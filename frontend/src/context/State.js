import React, {useState, useRef, useEffect} from 'react'
import axios from 'axios';

// creating `context`
const StateContext = React.createContext()

function StateProvider({children}) {

    // media Query
    const [mediaQuery, setMediaQuery] = useState("(max-width: 800px)");

    const [fonts, setFonts] = useState([]);

    const [settings, setSettings] = useState({
        heading_color: "N/A"
    });

    // const [styles, setStyles] = useState({
    //     headings: {}
    // })

    const [pages, setPages] = useState({
        title: "N/A"
    });

    const [services, setServices] = useState([
        { id: 1, title: "1" },
        { id: 2, title: "2" },
    ]);

    const [clients, setClients] = useState([
        { id: 1, title: "1" },
        { id: 2, title: "2" },
    ]);
    
    // Set the cursor state
    const [cursor, setCursor] = useState({ active: false });

    // Set the open/close state of the modal
    const [isModalOpen, setIsModalOpen] = useState(false);

    // Hold the reference of the video
    const videoRef = useRef(null);

    // Handle the openModal function
    function openModal() {
        setIsModalOpen(true)
        videoRef.current.seek(0) // Replay
        videoRef.current.play()
        videoRef.current.muted=false
    }

    // Handle the closeModal function
    function closeModal() {
        console.log(videoRef)
        // videoRef.current.pause()
        videoRef.current.muted=true
        videoRef.current.currentTime=0
        setIsModalOpen(false)
    }

    function playOrPause() {
        if ( videoRef.current.paused ) {
            videoRef.current.play();
        } else {
            videoRef.current.pause();
        }
    }



    
  const getSettingsData = async () => {

    await axios.get(`${process.env.REACT_APP_API_BASE_URL}/settings`).then( res => {
         
        // console.log( "Res--", res.data )

        // store API response into State
        setSettings( res.data[0] )

        // immediately update the state
        setSettings((state) => {
            // console.log("immediately update the state --> setSettings", state); 
            return state;
        }); 

    }).catch( err=> {
        console.log( "Err--", err )
    })
    
  }



  const getPagesData = async () => {

    await axios.get(`${process.env.REACT_APP_API_BASE_URL}/pages`).then( res => {
         
        // console.log( "Res--", res.data )

        // store API response into State
        setPages( res.data )

        // immediately update the state
        setPages((state) => {
            // console.log("immediately update the state --> setPages", state); 
            return state;
        }); 

    }).catch( err=> {
        console.log( "Err--", err )
    })
    
  }




  const getServicesData = async () => {

    await axios.get(`${process.env.REACT_APP_API_BASE_URL}/services`).then( res => {
         
        console.log( "Res--", res.data )

        // store API response into State
        setServices( res.data )

        // immediately update the state
        setServices((state) => {
            // console.log("immediately update the state --> setServices", state); 
            return state;
        }); 

    }).catch( err=> {
        console.log( "Err--", err )
    })
    
  }


  
  const getClientsData = async () => {

    await axios.get(`${process.env.REACT_APP_API_BASE_URL}/clients`).then( res => {
         
        // console.log( "Res--", res.data )

        // store API response into State
        setClients( res.data )

        // immediately update the state
        setClients((state) => {
            // console.log("immediately update the state --> setClients", state); 
            return state;
        }); 

    }).catch( err=> {
        console.log( "Err--", err )
    })
    
  }







  const getFontsData = async () => {

    await axios.get(`${process.env.REACT_APP_API_BASE_URL}/fonts`).then( res => {
         
        // console.log( "Res--", res.data );

        // store API response into State
        setFonts( res.data )

        // immediately update the state
        setFonts((state) => {
            // console.log("immediately update the state --> getFontsData", state); 
            return state;
        });

    }).catch( err=> {
        console.log( "Err--", err )
    })
    
  }


  useEffect( ()=> {
    getSettingsData();
    getPagesData();
    getServicesData();
    getClientsData();
    getFontsData();
  }, [])

    
    return(
        <StateContext.Provider value={{
            cursor, 
            setCursor, 
            isModalOpen, 
            openModal, 
            closeModal,
            videoRef,
            playOrPause,
            settings,
            pages,
            services,
            clients,
            fonts,
            mediaQuery
        }}>
            {children}
        </StateContext.Provider>
    )
}

export {StateContext, StateProvider}
